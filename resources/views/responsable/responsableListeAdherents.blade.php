<x-responsable.responsable-dashboard-layout :title="$pageTitle">
    <div class="w-full min-h-screen px-3 py-6 sm:px-5 lg:px-8">
        <div class="mx-auto w-full max-w-7xl">
            <div class="mb-3 flex items-center justify-between gap-4 max-md:flex-col max-md:items-stretch">
                <div>
                    <h1 class="text-2xl font-semibold text-[#F8FAFC] max-md:text-xl">
                        Liste des adherents
                    </h1>
                    <p class="mt-1 text-sm text-[#A1A1AA]">
                        Informations des adherents, abonnements et activites.
                    </p>
                </div>

                <div
                    class="flex flex-wrap items-center justify-end gap-3 max-md:w-full max-sm:flex-col max-sm:items-stretch">
                    {{-- Search --}}
                    <form method="GET" action="/responsable/listeAdherents" role="search"
                        class="flex flex-wrap items-center justify-end gap-3 max-sm:w-full">

                        <div
                            class="flex h-11 w-85 items-center rounded-lg border border-slate-300 bg-white shadow-sm focus-within:border-blue-500 focus-within:ring-2 focus-within:ring-blue-500 dark:border-neutral-700 dark:bg-neutral-800 max-md:w-64 max-sm:w-full">

                            <label for="search" class="sr-only">Search</label>

                            <input type="search" id="search" name="search"
                                placeholder="nom, prenom, abonnement ou activite..."
                                value="{{ request('search') }}"
                                class="block w-full rounded-lg border-0  bg-[#1B1E21] px-3 py-2.5 text-sm text-[#F8FAFC] placeholder:text-[#71717A]  focus:outline-none focus:ring-0  transition-all duration-200  max-md:px-2.5  max-md:py-2  max-md:text-xs" />

                            <button type="submit" aria-label="Search"
                                class="inline-flex items-center justify-center rounded-lg bg-indigo-500 px-4 py-2.5 text-sm font-semibold text-white transition-all duration-200 hover:bg-indigo-400 hover:shadow-lg hover:shadow-indigo-500/10 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-[#212427] active:scale-[0.98] cursor-pointer shrink-0 max-md:px-3 max-md:py-2 max-md:text-xs">

                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    class="w-5 h-5 fill-none stroke-white stroke-2" aria-hidden="true">
                                    <circle cx="11" cy="11" r="7"></circle>
                                    <path d="m20 20-4-4"></path>
                                </svg>

                            </button>
                        </div>
                    </form>

                    {{-- Cancel --}}
                    @if(request('search'))
                        <a href="/responsable/listeAdherents"
                            class="inline-flex items-center justify-center  h-11 px-4   text-sm font-medium   text-slate-700 dark:text-slate-200 bg-slate-100 dark:bg-neutral-700 border border-slate-300 dark:border-neutral-600 rounded-lg   hover:bg-slate-200 dark:hover:bg-neutral-600 transition-colors duration-200 shrink-0 max-sm:w-full max-sm:h-10">
                            Cancel
                        </a>
                    @endif
                </div>
            </div>

            @if (session('success'))
                <div class="mb-3 flex items-center justify-between gap-3 rounded-lg border border-green-500/30 bg-green-500/10 px-4 py-3 text-green-400 shadow-sm"
                    role="alert">
                    <span class="font-semibold">{{ session('success') }}</span>
                    <button type="button" aria-label="Fermer" onclick="this.parentElement.remove()"
                        class="inline-flex h-8 w-8 items-center justify-center text-xl text-green-400 hover:text-green-200">
                        &times;
                    </button>
                </div>
            @endif

            <div
                class="w-full overflow-x-auto rounded-2xl border border-[#34383D] bg-[#1B1E21]/50 shadow-xl max-md:rounded-xl">
                <table class="w-full min-w-600 border-collapse text-left">
                    <thead class="border-b border-[#34383D] bg-[#212427]">
                        <tr>
                            <th scope="col"
                                class="whitespace-nowrap px-5 py-4 text-xs font-semibold uppercase tracking-wider text-[#F8FAFC]">
                                Nom</th>
                            <th scope="col"
                                class="whitespace-nowrap px-5 py-4 text-xs font-semibold uppercase tracking-wider text-[#F8FAFC]">
                                Prenom</th>
                            <th scope="col"
                                class="whitespace-nowrap px-5 py-4 text-xs font-semibold uppercase tracking-wider text-[#F8FAFC]">
                                Telephone</th>
                            <th scope="col"
                                class="whitespace-nowrap px-5 py-4 text-xs font-semibold uppercase tracking-wider text-[#F8FAFC]">
                                Date de naissance</th>
                            <th scope="col"
                                class="whitespace-nowrap px-5 py-4 text-xs font-semibold uppercase tracking-wider text-[#F8FAFC]">
                                Assurance</th>
                            <th scope="col"
                                class="whitespace-nowrap px-5 py-4 text-xs font-semibold uppercase tracking-wider text-[#F8FAFC]">
                                Responsable</th>
                            <th scope="col"
                                class="whitespace-nowrap px-5 py-4 text-xs font-semibold uppercase tracking-wider text-[#F8FAFC]">
                                Type abonnement</th>
                            <th scope="col"
                                class="whitespace-nowrap px-5 py-4 text-xs font-semibold uppercase tracking-wider text-[#F8FAFC]">
                                Debut abonnement</th>
                            <th scope="col"
                                class="whitespace-nowrap px-5 py-4 text-xs font-semibold uppercase tracking-wider text-[#F8FAFC]">
                                Fin abonnement</th>
                            <th scope="col"
                                class="whitespace-nowrap px-5 py-4 text-xs font-semibold uppercase tracking-wider text-[#F8FAFC]">
                                Prix abonnement</th>
                            <th scope="col"
                                class="whitespace-nowrap px-5 py-4 text-xs font-semibold uppercase tracking-wider text-[#F8FAFC]">
                                Activites</th>

                            <th scope="col"
                                class="whitespace-nowrap px-5 py-4 text-xs font-semibold uppercase tracking-wider text-[#F8FAFC]">
                                Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-[#34383D]">
                        @forelse ($adherents as $adherent)
                        @php($abonnement = $adherent->abonnement->first())
                        <tr class="cursor-pointer transition-colors hover:bg-[#212427]" data-adherent-row>
                            <td class="whitespace-nowrap px-5 py-4 text-sm text-[#F8FAFC]">
                                {{ $adherent->personne->Nom }}
                            </td>
                            <td class="whitespace-nowrap px-5 py-4 text-sm text-[#F8FAFC]">
                                {{ $adherent->personne->Prenom }}
                            </td>
                            <td class="whitespace-nowrap px-5 py-4 text-sm text-[#F8FAFC]">
                                {{ $adherent->personne->Tele }}
                            </td>
                            <td class="whitespace-nowrap px-5 py-4 text-sm text-[#F8FAFC]">
                                {{ $adherent->personne->DateNaissance }}
                            </td>
                            <td class="whitespace-nowrap px-5 py-4 text-sm text-[#F8FAFC]">
                                {{ $adherent->Assurance }}
                            </td>
                            <td class="whitespace-nowrap px-5 py-4 text-sm text-[#F8FAFC]">
                                {{ $adherent->responsable?->personne?->Prenom }} 
                            </td>
                            <td class="whitespace-nowrap px-5 py-4 text-sm text-[#F8FAFC]">
                                {{ $abonnement?->type_abonnement?->Libelle ?? '-' }}
                            </td>
                            <td class="whitespace-nowrap px-5 py-4 text-sm text-[#F8FAFC]">
                                {{ $abonnement?->DateDebut ?? '-' }}
                            </td>
                            <td class="whitespace-nowrap px-5 py-4 text-sm text-[#F8FAFC]">
                                {{ $abonnement?->DateFin ?? '-' }}
                            </td>
                            <td class="whitespace-nowrap px-5 py-4 text-sm text-[#F8FAFC]">
                                {{ $abonnement?->Prix ?? '-' }}
                            </td>
                            <td class="px-5 py-4 text-sm text-[#F8FAFC]">
                                {{ $adherent->activite->pluck('Libelle')->join(', ') ?: '-' }}
                            </td>

                            {{-- Actions --}}
                            <td class="whitespace-nowrap px-6 py-4 max-lg:px-4 max-lg:py-3">

                                <div class="flex items-center justify-center gap-1">

                                    <button type="button" data-id="{{ $adherent->id }}"
                                        data-nom="{{ $adherent->personne->Nom }}"
                                        data-prenom="{{ $adherent->personne->Prenom }}"
                                        data-tele="{{ $adherent->personne->Tele }}"
                                        data-date="{{ $adherent->personne->DateNaissance }}"
                                        data-assurance="{{ $adherent->Assurance }}"
                                        data-responsable="{{ $adherent->responsable?->personne?->Prenom }}"
                                        data-type-abonnement="{{ $abonnement?->typeAbonnement_id ?? '' }}"
                                        data-type-label="{{ $abonnement?->type_abonnement?->Libelle ?? '-' }}"
                                        data-date-debut="{{ $abonnement?->DateDebut ?? '' }}"
                                        data-date-fin="{{ $abonnement?->DateFin ?? '-' }}"
                                        data-prix-abonnement="{{ $abonnement?->Prix ?? '' }}"
                                        data-activite="{{ $adherent->activite->first()?->id ?? '' }}"
                                        data-activites="{{ $adherent->activite->pluck('Libelle')->join(', ') ?: '-' }}"
                                        aria-label="Modifier l'adherent"
                                        class="edit-adherent inline-flex h-10 w-10 items-center justify-center rounded-lg p-2 transition-all duration-200 hover:bg-[#34383D] active:scale-95 cursor-pointer">
                                        <img class="block h-6 w-6 object-contain"
                                            src="{{ asset('icons/edit.svg') }}" alt="Edit">
                                    </button>

                                    <form method="POST" action="{{ route('responsable.adherents.destroy', $adherent->id) }}"
                                        onsubmit="return confirm('Are you sure ?')" class="inline-flex">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            aria-label="Supprimer l'adherent"
                                            class="inline-flex h-10 w-10 items-center justify-center rounded-lg p-2 transition-all duration-200 hover:bg-[#34383D] active:scale-95 cursor-pointer">
                                            <img class="block h-6 w-6 object-contain"
                                                src="{{ asset('icons/delete.svg') }}" alt="Delete">
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="13" class="px-5 py-10 text-center text-sm text-[#A1A1AA]">
                                Aucun adherent trouve.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div id="show-adherent-modal" class="fixed inset-0 z-50 hidden items-center justify-center p-4 backdrop-blur-md"
                aria-hidden="true">
                <div class="absolute inset-0 bg-black/70" data-show-modal-close></div>

                <div class="relative z-10 max-h-[90vh] w-full max-w-3xl overflow-y-auto rounded-2xl border border-[#34383D] bg-[#212427] p-6 shadow-2xl max-md:p-4"
                    role="dialog" aria-modal="true" aria-labelledby="show-adherent-title">
                    <button type="button" data-show-modal-close aria-label="Fermer"
                        class="absolute right-4 top-4 inline-flex h-10 w-10 items-center justify-center rounded-lg text-2xl text-[#A1A1AA] hover:bg-[#34383D] hover:text-white cursor-pointer">&times;</button>

                    <div class="mb-6 text-center">
                        <img src="{{ asset('icons/top-sport.png') }}" alt="Top Sport"
                            class="mx-auto h-20 w-20 object-contain">
                        <h2 id="show-adherent-title" class="mt-3 text-xl font-semibold text-[#F8FAFC]">Informations de l'adherent</h2>
                    </div>

                    <div class="grid grid-cols-2 gap-4 max-md:grid-cols-1">
                        <div class="rounded-lg bg-[#1B1E21] p-4">
                            <p class="text-xs uppercase tracking-wider text-[#71717A]">Nom</p>
                            <p id="show-nom" class="mt-1 text-sm font-semibold text-[#F8FAFC]"></p>
                        </div>
                        <div class="rounded-lg bg-[#1B1E21] p-4">
                            <p class="text-xs uppercase tracking-wider text-[#71717A]">Prenom</p>
                            <p id="show-prenom" class="mt-1 text-sm font-semibold text-[#F8FAFC]"></p>
                        </div>
                        <div class="rounded-lg bg-[#1B1E21] p-4">
                            <p class="text-xs uppercase tracking-wider text-[#71717A]">Telephone</p>
                            <p id="show-tele" class="mt-1 text-sm font-semibold text-[#F8FAFC]"></p>
                        </div>
                        <div class="rounded-lg bg-[#1B1E21] p-4">
                            <p class="text-xs uppercase tracking-wider text-[#71717A]">Date de naissance</p>
                            <p id="show-date" class="mt-1 text-sm font-semibold text-[#F8FAFC]"></p>
                        </div>
                        <div class="rounded-lg bg-[#1B1E21] p-4">
                            <p class="text-xs uppercase tracking-wider text-[#71717A]">Assurance</p>
                            <p id="show-assurance" class="mt-1 text-sm font-semibold text-[#F8FAFC]"></p>
                        </div>
                        <div class="rounded-lg bg-[#1B1E21] p-4">
                            <p class="text-xs uppercase tracking-wider text-[#71717A]">Responsable</p>
                            <p id="show-responsable" class="mt-1 text-sm font-semibold text-[#F8FAFC]"></p>
                        </div>
                        <div class="rounded-lg bg-[#1B1E21] p-4">
                            <p class="text-xs uppercase tracking-wider text-[#71717A]">Type abonnement</p>
                            <p id="show-type-abonnement" class="mt-1 text-sm font-semibold text-[#F8FAFC]"></p>
                        </div>
                        <div class="rounded-lg bg-[#1B1E21] p-4">
                            <p class="text-xs uppercase tracking-wider text-[#71717A]">Prix abonnement</p>
                            <p id="show-prix-abonnement" class="mt-1 text-sm font-semibold text-[#F8FAFC]"></p>
                        </div>
                        <div class="rounded-lg bg-[#1B1E21] p-4">
                            <p class="text-xs uppercase tracking-wider text-[#71717A]">Debut abonnement</p>
                            <p id="show-date-debut" class="mt-1 text-sm font-semibold text-[#F8FAFC]"></p>
                        </div>
                        <div class="rounded-lg bg-[#1B1E21] p-4">
                            <p class="text-xs uppercase tracking-wider text-[#71717A]">Fin abonnement</p>
                            <p id="show-date-fin" class="mt-1 text-sm font-semibold text-[#F8FAFC]"></p>
                        </div>
                        <div class="col-span-2 rounded-lg bg-[#1B1E21] p-4 max-md:col-span-1">
                            <p class="text-xs uppercase tracking-wider text-[#71717A]">Activites</p>
                            <p id="show-activites" class="mt-1 text-sm font-semibold text-[#F8FAFC]"></p>
                        </div>
                    </div>
                </div>
            </div>

            <div id="edit-adherent-modal" class="fixed inset-0 z-50 hidden items-center justify-center p-4 backdrop-blur-md"
                aria-hidden="true">
                <div class="absolute inset-0 bg-black/70" data-modal-close></div>

                <div class="relative z-10 max-h-[90vh] w-full max-w-3xl overflow-y-auto rounded-2xl border border-[#34383D] bg-[#212427] p-6 shadow-2xl max-md:p-4"
                    role="dialog" aria-modal="true" aria-labelledby="edit-adherent-title">
                    <div class="mb-6 flex items-center justify-between">
                        <div>
                            <h2 id="edit-adherent-title" class="text-xl font-semibold text-[#F8FAFC] ">Modifier l'adherent</h2>
                            <p class="mt-1 text-sm text-[#A1A1AA]">Modifiez les informations de l'adherent.</p>
                        </div>
                        <button type="button" data-modal-close aria-label="Fermer"
                            class="inline-flex h-10 w-10 items-center justify-center rounded-lg text-2xl text-[#A1A1AA] hover:bg-[#34383D] hover:text-white cursor-pointer">&times;</button>
                    </div>

                    <form id="edit-adherent-form" method="POST" data-base-url="{{ url('/responsable/adherents') }}">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">

                        <div class="grid grid-cols-2 gap-5 max-md:grid-cols-1 max-md:gap-4">
                            <div>
                                <label for="edit-nom" class="block text-sm font-medium text-[#F8FAFC]">Nom</label>
                                <input id="edit-nom" name="nom" type="text" required
                                    class="mt-2 block w-full rounded-lg border border-[#3A3F45] bg-[#1B1E21] px-3 py-2.5 text-sm text-[#F8FAFC] focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/30">
                            </div>
                            <div>
                                <label for="edit-prenom" class="block text-sm font-medium text-[#F8FAFC]">Prenom</label>
                                <input id="edit-prenom" name="prenom" type="text" required
                                    class="mt-2 block w-full rounded-lg border border-[#3A3F45] bg-[#1B1E21] px-3 py-2.5 text-sm text-[#F8FAFC] focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/30">
                            </div>
                            <div>
                                <label for="edit-tele" class="block text-sm font-medium text-[#F8FAFC]">Telephone</label>
                                <input id="edit-tele" name="tele" type="text" required
                                    class="mt-2 block w-full rounded-lg border border-[#3A3F45] bg-[#1B1E21] px-3 py-2.5 text-sm text-[#F8FAFC] focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/30">
                            </div>
                            <div>
                                <label for="edit-date" class="block text-sm font-medium text-[#F8FAFC]">Date de naissance</label>
                                <input id="edit-date" name="date" type="date" required
                                    class="mt-2 block w-full rounded-lg border border-[#3A3F45] bg-[#1B1E21] px-3 py-2.5 text-sm text-[#F8FAFC] focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/30">
                            </div>
                            <div>
                                <label for="edit-activite" class="block text-sm font-medium text-[#F8FAFC]">Activite</label>
                                <select id="edit-activite" name="activite" required
                                    class="mt-2 block w-full rounded-lg border border-[#3A3F45] bg-[#1B1E21] px-3 py-2.5 text-sm text-[#F8FAFC] focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/30">
                                    @foreach ($activites as $activiteOption)
                                        <option value="{{ $activiteOption->id }}">{{ $activiteOption->Libelle }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="edit-prix-abonnement" class="block text-sm font-medium text-[#F8FAFC]">Prix abonnement</label>
                                <input id="edit-prix-abonnement" name="prixAbonnement" type="number" min="10" required
                                    class="mt-2 block w-full rounded-lg border border-[#3A3F45] bg-[#1B1E21] px-3 py-2.5 text-sm text-[#F8FAFC] focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/30">
                            </div>
                            <div>
                                <label for="edit-type-abonnement" class="block text-sm font-medium text-[#F8FAFC]">Type abonnement</label>
                                <select id="edit-type-abonnement" name="typeAbon" required
                                    class="mt-2 block w-full rounded-lg border border-[#3A3F45] bg-[#1B1E21] px-3 py-2.5 text-sm text-[#F8FAFC] focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/30">
                                    @foreach ($typeAbonnements as $typeOption)
                                        <option value="{{ $typeOption->id }}">{{ $typeOption->Libelle }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="edit-prix-assurance" class="block text-sm font-medium text-[#F8FAFC]">Prix assurance</label>
                                <input id="edit-prix-assurance" name="prixAssurance" type="number" min="10" required
                                    class="mt-2 block w-full rounded-lg border border-[#3A3F45] bg-[#1B1E21] px-3 py-2.5 text-sm text-[#F8FAFC] focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/30">
                            </div>
                            <div>
                                <label for="edit-date-debut" class="block text-sm font-medium text-[#F8FAFC]">Date debut</label>
                                <input id="edit-date-debut" name="dateDebut" type="date" required
                                    class="mt-2 block w-full rounded-lg border border-[#3A3F45] bg-[#1B1E21] px-3 py-2.5 text-sm text-[#F8FAFC] focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/30">
                            </div>
                        </div>

                        <div class="mt-6 flex justify-end gap-3">
                            <button type="button" data-modal-close
                                class="rounded-lg border border-[#3A3F45] px-5 py-2.5 text-sm font-semibold text-[#D4D4D8] hover:bg-[#34383D] cursor-pointer">Annuler</button>
                            <button type="submit"
                                class="rounded-lg bg-indigo-500 px-5 py-2.5 text-sm font-semibold text-white hover:bg-indigo-400 cursor-pointer">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Pagination --}}
            <div class="mt-4 flex justify-center">
                {{ $adherents->links() }}
            </div>
        </div>
    </div>

</x-responsable.responsable-dashboard-layout>