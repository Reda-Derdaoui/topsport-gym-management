<x-admin.admin-dashboard-layout :title="$pageTitle">
	<div class="w-full px-3 py-6 sm:px-5 lg:px-8">
		<div class="mx-auto w-full max-w-7xl">
			<div class="mb-6">
				<h1 class="text-2xl font-semibold text-[#F8FAFC] max-md:text-xl">Tableau de bord</h1>
				<p class="mt-1 text-sm text-[#A1A1AA]">Vue d'ensemble de l'activite de Top Sport.</p>
			</div>

			<div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-5">
				@foreach ([
					['label' => 'Revenu total', 'value' => number_format($summary['totalRevenue'], 2, ',', ' ') . ' DH'],
					['label' => 'Total adherents', 'value' => $summary['totalAdherents']],
					['label' => 'Total activites', 'value' => $summary['totalActivities']],
					['label' => 'Abonnements actifs', 'value' => $summary['activeSubscriptions']],
					['label' => 'Abonnements expires', 'value' => $summary['expiredSubscriptions']],
				] as $card)
					<div class="rounded-2xl border border-[#34383D] bg-[#212427] p-5 shadow-lg">
						<p class="text-sm text-[#A1A1AA]">{{ $card['label'] }}</p>
						<p class="mt-3 text-2xl font-semibold text-[#F8FAFC]">{{ $card['value'] }}</p>
					</div>
				@endforeach
			</div>

			<div class="mt-6 grid grid-cols-1 gap-6 xl:grid-cols-2">
				<section class="rounded-2xl border border-[#34383D] bg-[#212427] p-5 shadow-lg">
					<h2 class="text-lg font-semibold text-[#F8FAFC]">Revenu par mois</h2>
					<div class="relative mt-4 h-72"><canvas id="revenue-by-month-chart"></canvas></div>
				</section>

				<section class="rounded-2xl border border-[#34383D] bg-[#212427] p-5 shadow-lg">
					<h2 class="text-lg font-semibold text-[#F8FAFC]">Revenu par activite</h2>
					<div class="relative mt-4 h-72"><canvas id="revenue-by-activity-chart"></canvas></div>
				</section>

				<section class="rounded-2xl border border-[#34383D] bg-[#212427] p-5 shadow-lg xl:col-span-2">
					<h2 class="text-lg font-semibold text-[#F8FAFC]">Adherents par activite</h2>
					<div class="relative mt-4 h-72"><canvas id="adherents-by-activity-chart"></canvas></div>
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
			'revenueByMonth' => [
				'labels' => $revenueByMonth->keys()->values()->all(),
				'values' => $revenueByMonth->values()->all(),
			],
			'revenueByActivity' => [
				'labels' => $revenueByActivity->keys()->values()->all(),
				'values' => $revenueByActivity->values()->all(),
			],
			'adherentsByActivity' => [
				'labels' => $adherentsByActivity->keys()->values()->all(),
				'values' => $adherentsByActivity->values()->all(),
			],
		];
	@endphp
	<script id="admin-dashboard-chart-data" type="application/json">
		@json($chartData)
	</script>
</x-admin.admin-dashboard-layout>