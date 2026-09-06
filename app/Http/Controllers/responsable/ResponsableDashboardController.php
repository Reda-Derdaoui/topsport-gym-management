<?php

namespace App\Http\Controllers\responsable;

use App\Http\Controllers\Controller;
use App\Models\Abonnement;
use App\Models\Activite;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ResponsableDashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        $almostFinishedLimit = $today->copy()->addDays(7);
        $responsableId = Auth::user()->responsable->id;

        $adherentsByActivity = Activite::query()
            ->whereHas('adherent', fn ($query) => $query->where('responsable_id', $responsableId))
            ->withCount([
                'adherent' => fn ($query) => $query->where('responsable_id', $responsableId),
            ])
            ->orderBy('Libelle')
            ->get()
            ->mapWithKeys(fn ($activity) => [$activity->Libelle => $activity->adherent_count]);

        $almostFinished = Abonnement::with([
            'adherent.personne',
            'adherent.activite',
            'type_abonnement',
        ])
            ->where('responsable_id', $responsableId)
            ->whereDate('DateDebut', '<=', $today)
            ->whereBetween('DateFin', [$today, $almostFinishedLimit])
            ->orderBy('DateFin')
            ->get()
            ->map(fn ($subscription) => $this->subscriptionSummary($subscription, $today));

        $expired = Abonnement::with([
            'adherent.personne',
            'adherent.activite',
            'type_abonnement',
        ])
            ->where('responsable_id', $responsableId)
            ->whereDate('DateFin', '<', $today)
            ->orderByDesc('DateFin')
            ->get()
            ->map(fn ($subscription) => $this->subscriptionSummary($subscription, $today));

        return view('responsable.responsableDashboard', [
            'pageTitle' => 'Responsable | Dashboard',
            'adherentsByActivity' => $adherentsByActivity,
            'almostFinished' => $almostFinished,
            'expired' => $expired,
        ]);
    }

    private function subscriptionSummary($subscription, Carbon $today): array
    {
        return [
            'nom' => $subscription->adherent?->personne?->Nom ?? '-',
            'prenom' => $subscription->adherent?->personne?->Prenom ?? '-',
            'activities' => $subscription->adherent?->activite?->pluck('Libelle')->join(', ') ?: '-',
            'type' => $subscription->type_abonnement?->Libelle ?? '-',
            'dateFin' => $subscription->DateFin,
            'daysRemaining' => $today->diffInDays(Carbon::parse($subscription->DateFin), false),
        ];
    }
}
