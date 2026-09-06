<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Abonnement;
use App\Models\Activite;
use App\Models\Adherent;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        $almostFinishedLimit = $today->copy()->addDays(7);

        $revenueByMonth = Abonnement::query()
            ->selectRaw("DATE_FORMAT(DateDebut, '%Y-%m') as month_key")
            ->selectRaw('SUM(Prix) as total')
            ->groupBy('month_key')
            ->orderBy('month_key')
            ->get()
            ->mapWithKeys(function ($row) {
                return [
                    Carbon::createFromFormat('Y-m', $row->month_key)->translatedFormat('F Y') => (float) $row->total,
                ];
            });

        $revenueByActivity = DB::table('activites')
            ->join('participer', 'activites.id', '=', 'participer.activite_id')
            ->join('abonnements', 'participer.adherent_id', '=', 'abonnements.adherent_id')
            ->select('activites.Libelle')
            ->selectRaw('SUM(abonnements.Prix) as total')
            ->groupBy('activites.id', 'activites.Libelle')
            ->orderBy('activites.Libelle')
            ->get()
            ->mapWithKeys(fn ($row) => [$row->Libelle => (float) $row->total]);

        $adherentsByActivity = Activite::query()
            ->withCount('adherent')
            ->orderBy('Libelle')
            ->get()
            ->mapWithKeys(fn ($activity) => [$activity->Libelle => $activity->adherent_count]);

        $almostFinished = Abonnement::with([
            'adherent.personne',
            'adherent.activite',
            'type_abonnement',
        ])
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
            ->whereDate('DateFin', '<', $today)
            ->orderByDesc('DateFin')
            ->get()
            ->map(fn ($subscription) => $this->subscriptionSummary($subscription, $today));

        return view('admin.adminDashboard', [
            'pageTitle' => 'Admin | Dashboard',
            'summary' => [
                'totalRevenue' => (float) Abonnement::sum('Prix'),
                'totalAdherents' => Adherent::count(),
                'totalActivities' => Activite::count(),
                'activeSubscriptions' => Abonnement::whereDate('DateDebut', '<=', $today)
                    ->whereDate('DateFin', '>=', $today)
                    ->count(),
                'expiredSubscriptions' => Abonnement::whereDate('DateFin', '<', $today)->count(),
            ],
            'revenueByMonth' => $revenueByMonth,
            'revenueByActivity' => $revenueByActivity,
            'adherentsByActivity' => $adherentsByActivity,
            'almostFinished' => $almostFinished,
            'expired' => $expired,
            'today' => $today,
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
