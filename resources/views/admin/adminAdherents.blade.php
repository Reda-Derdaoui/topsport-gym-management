<x-admin.admin-dashboard-layout :title="$pageTitle">
    <div class="w-full min-h-screen px-3 py-6 sm:px-5 lg:px-8">
        <div class="mx-auto w-full max-w-7xl">
            <div class="mb-3 flex items-center justify-between gap-4 max-md:flex-col max-md:items-stretch">
                <div>
                    <h1 class="text-2xl font-semibold text-[#F8FAFC] max-md:text-xl">Liste des adherents</h1>
                    <p class="mt-1 text-sm text-[#A1A1AA]">Informations des adherents, abonnements et activites.</p>
                </div>

                <div class="flex flex-wrap items-center justify-end gap-3 max-md:w-full max-sm:flex-col max-sm:items-stretch">
                    <form method="GET" action="{{ route('admin.adherents.index') }}" role="search"
                        class="flex flex-wrap items-center justify-end gap-3 max-sm:w-full">
                        <div class="flex h-11 w-85 items-center rounded-lg border border-slate-300 bg-white shadow-sm focus-within:border-blue-500 focus-within:ring-2 focus-within:ring-blue-500 dark:border-neutral-700 dark:bg-neutral-800 max-md:w-64 max-sm:w-full">
                            <label for="search" class="sr-only">Search</label>
                            <input type="search" id="search" name="search"
                                placeholder="nom, prenom, abonnement ou activite..."
                                value="{{ request('search') }}"
                                class="block w-full rounded-lg border-0 bg-[#1B1E21] px-3 py-2.5 text-sm text-[#F8FAFC] placeholder:text-[#71717A] focus:outline-none focus:ring-0 max-md:px-2.5 max-md:py-2 max-md:text-xs">
                            <button type="submit" aria-label="Search"
                                class="inline-flex items-center justify-center rounded-lg bg-indigo-500 px-4 py-2.5 text-white hover:bg-indigo-400 max-md:px-3">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5 fill-none stroke-white stroke-2" aria-hidden="true">
                                    <circle cx="11" cy="11" r="7"></circle><path d="m20 20-4-4"></path>
                                </svg>
                            </button>
                        </div>
                    </form>
                    @if(request('search'))
                        <a href="{{ route('admin.adherents.index') }}"
                            class="inline-flex h-11 items-center justify-center rounded-lg border border-slate-300 bg-slate-100 px-4 text-sm font-medium text-slate-700 hover:bg-slate-600 dark:border-neutral-600 dark:bg-neutral-700 dark:text-slate-200">
                            Cancel
                        </a>
                    @endif
                </div>
            </div>

            <div class="w-full overflow-x-auto rounded-2xl border border-[#34383D] bg-[#1B1E21]/50 shadow-xl max-md:rounded-xl">
                <table class="w-full min-w-600 border-collapse text-left">
                    <thead class="border-b border-[#34383D] bg-[#212427]">
                        <tr>
                            @foreach (['Nom', 'Prenom', 'Telephone', 'Date de naissance', 'Assurance', 'Responsable', 'Type abonnement', 'Debut abonnement', 'Fin abonnement', 'Prix abonnement', 'Activites'] as $heading)
                                <th scope="col" class="whitespace-nowrap px-5 py-4 text-xs font-semibold uppercase tracking-wider text-[#F8FAFC]">{{ $heading }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#34383D]">
                        @forelse ($adherents as $adherent)
                            @php($abonnement = $adherent->abonnement->first())
                            <tr class="transition-colors hover:bg-[#212427]">
                                <td class="whitespace-nowrap px-5 py-4 text-sm text-[#F8FAFC]">{{ $adherent->personne?->Nom ?? '-' }}</td>
                                <td class="whitespace-nowrap px-5 py-4 text-sm text-[#F8FAFC]">{{ $adherent->personne?->Prenom ?? '-' }}</td>
                                <td class="whitespace-nowrap px-5 py-4 text-sm text-[#F8FAFC]">{{ $adherent->personne?->Tele ?? '-' }}</td>
                                <td class="whitespace-nowrap px-5 py-4 text-sm text-[#F8FAFC]">{{ $adherent->personne?->DateNaissance ?? '-' }}</td>
                                <td class="whitespace-nowrap px-5 py-4 text-sm text-[#F8FAFC]">{{ $adherent->Assurance ?? '-' }}</td>
                                <td class="whitespace-nowrap px-5 py-4 text-sm text-[#F8FAFC]">{{ $adherent->responsable?->personne?->Prenom ?? '-' }}</td>
                                <td class="whitespace-nowrap px-5 py-4 text-sm text-[#F8FAFC]">{{ $abonnement?->type_abonnement?->Libelle ?? '-' }}</td>
                                <td class="whitespace-nowrap px-5 py-4 text-sm text-[#F8FAFC]">{{ $abonnement?->DateDebut ?? '-' }}</td>
                                <td class="whitespace-nowrap px-5 py-4 text-sm text-[#F8FAFC]">{{ $abonnement?->DateFin ?? '-' }}</td>
                                <td class="whitespace-nowrap px-5 py-4 text-sm text-[#F8FAFC]">{{ $abonnement?->Prix ?? '-' }}</td>
                                <td class="px-5 py-4 text-sm text-[#F8FAFC]">{{ $adherent->activite->pluck('Libelle')->join(', ') ?: '-' }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="11" class="px-5 py-10 text-center text-sm text-[#A1A1AA]">Aucun adherent trouve.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4 flex justify-center">{{ $adherents->links() }}</div>
        </div>
    </div>
</x-admin.admin-dashboard-layout>

