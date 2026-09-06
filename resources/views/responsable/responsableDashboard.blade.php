<x-responsable.responsable-dashboard-layout :title="$pageTitle">
    <div class="w-full px-3 py-6 sm:px-5 lg:px-8">
        <div class="mx-auto w-full max-w-7xl">
            <div class="mb-6">
                <h1 class="text-2xl font-semibold text-[#F8FAFC] max-md:text-xl">Tableau de bord</h1>
                <p class="mt-1 text-sm text-[#A1A1AA]">Suivi des adherents et des abonnements.</p>
            </div>

            <div class="grid grid-cols-1 gap-6 xl:grid-cols-2">
                <section class="rounded-2xl border border-[#34383D] bg-[#212427] p-5 shadow-lg xl:col-span-2">
                    <h2 class="text-lg font-semibold text-[#F8FAFC]">Adherents par activite</h2>
                    <div class="relative mt-4 h-72 w-full"><canvas id="adherents-by-activity-chart"></canvas></div>
                </section>
            </div>

            <div class="mt-6 grid grid-cols-1 gap-6 xl:grid-cols-2">
                <section class="overflow-hidden rounded-2xl border border-amber-500/30 bg-[#212427] shadow-lg">
                    <div class="border-b border-amber-500/20 px-5 py-4">
                        <h2 class="text-lg font-semibold text-amber-300">Paiements presque termines</h2>
                        <p class="mt-1 text-sm text-[#A1A1AA]">Abonnements avec 7 jours ou moins restants.</p>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full min-w-150 text-left">
                            <thead class="bg-[#1B1E21] text-xs uppercase tracking-wider text-[#A1A1AA]">
                                <tr><th class="px-5 py-3">Adherent</th><th class="px-5 py-3">Activite</th><th class="px-5 py-3">Type</th><th class="px-5 py-3">Fin</th><th class="px-5 py-3">Jours</th></tr>
                            </thead>
                            <tbody class="divide-y divide-[#34383D] text-sm text-[#D4D4D8]">
                                @forelse ($almostFinished as $subscription)
                                    <tr><td class="whitespace-nowrap px-5 py-3">{{ $subscription['nom'] }} {{ $subscription['prenom'] }}</td><td class="px-5 py-3">{{ $subscription['activities'] }}</td><td class="px-5 py-3">{{ $subscription['type'] }}</td><td class="whitespace-nowrap px-5 py-3">{{ $subscription['dateFin'] }}</td><td class="px-5 py-3 font-semibold text-amber-300">{{ $subscription['daysRemaining'] }}</td></tr>
                                @empty
                                    <tr><td colspan="5" class="px-5 py-8 text-center text-[#71717A]">Aucun abonnement proche de la fin.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </section>

                <section class="overflow-hidden rounded-2xl border border-red-500/30 bg-[#212427] shadow-lg">
                    <div class="border-b border-red-500/20 px-5 py-4">
                        <h2 class="text-lg font-semibold text-red-300">Paiements termines</h2>
                        <p class="mt-1 text-sm text-[#A1A1AA]">Abonnements dont la date de fin est depassee.</p>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full min-w-125 text-left">
                            <thead class="bg-[#1B1E21] text-xs uppercase tracking-wider text-[#A1A1AA]">
                                <tr><th class="px-5 py-3">Adherent</th><th class="px-5 py-3">Activite</th><th class="px-5 py-3">Type</th><th class="px-5 py-3">Fin</th><th class="px-5 py-3">Statut</th></tr>
                            </thead>
                            <tbody class="divide-y divide-[#34383D] text-sm text-[#D4D4D8]">
                                @forelse ($expired as $subscription)
                                    <tr><td class="whitespace-nowrap px-5 py-3">{{ $subscription['nom'] }} {{ $subscription['prenom'] }}</td><td class="px-5 py-3">{{ $subscription['activities'] }}</td><td class="px-5 py-3">{{ $subscription['type'] }}</td><td class="whitespace-nowrap px-5 py-3">{{ $subscription['dateFin'] }}</td><td class="px-5 py-3 font-semibold text-red-300">Expire</td></tr>
                                @empty
                                    <tr><td colspan="5" class="px-5 py-8 text-center text-[#71717A]">Aucun abonnement expire.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>
    </div>

    @php
        $chartData = [
            'adherentsByActivity' => [
                'labels' => $adherentsByActivity->keys()->values()->all(),
                'values' => $adherentsByActivity->values()->all(),
            ],
        ];
    @endphp
    <script id="admin-dashboard-chart-data" type="application/json">
        @json($chartData)
    </script>
</x-responsable.responsable-dashboard-layout>
