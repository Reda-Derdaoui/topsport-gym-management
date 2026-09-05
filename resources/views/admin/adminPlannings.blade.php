<x-admin.admin-dashboard-layout :title="$pageTitle">
    <div class="w-full max-w-6xl mx-auto
                px-6 py-6
                max-2xl:px-5
                max-xl:px-5
                max-lg:px-4
                max-md:px-3
                max-sm:px-2">

        {{-- Header --}}
        <div class="mb-6 max-lg:mb-5 max-md:mb-4">

            <h2 class="text-2xl font-semibold text-[#F8FAFC]
                       max-lg:text-xl
                       max-md:text-lg
                       max-sm:text-base">
                Gestion des plannings
            </h2>

            <p class="mt-1 text-sm text-[#A1A1AA]
                      max-md:text-xs">
                Ajoutez et gérez les plannings de votre salle de sport.
            </p>

        </div>


        {{-- Add planning --}}
        <div class="w-full
                    rounded-2xl
                    border border-[#34383D]
                    bg-[#212427]
                    p-6
                    shadow-xl

                    max-xl:p-5
                    max-lg:p-5
                    max-md:p-4
                    max-sm:p-3">

            <div class="mb-6
                        max-lg:mb-5
                        max-md:mb-4">

                <h3 class="text-lg font-semibold text-[#F8FAFC]
                           max-md:text-base
                           max-sm:text-sm">
                    Ajouter une planning
                </h3>

                <p class="mt-1 text-sm text-[#71717A]
                          max-md:text-xs">
                    Renseignez les palnnings
                </p>

            </div>
            @if (session('success'))
                <div class="flex items-center justify-between w-full max-w-sm gap-3 px-4 py-3 text-green-400 bg-green-500/10 border border-green-500/30 rounded-lg shadow-sm max-sm:p-2 max-md:max-w-full"
                    role="alert">
                    <span class="text-green-600 font-semibold text-md text-center">
                        {{ session('success') }}
                    </span>
                    <div class="ml-4 flex items-center">
                        <button class="inline-flex text-white transition ease-in-out duration-150 cursor-pointer"
                            onclick="return this.parentNode.parentNode.remove()">
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="green">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 011.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
            @endif


            <form action="" method="POST">
                @csrf
                <div class="grid grid-cols-2 gap-5  max-lg:gap-4 max-md:grid-cols-1  max-md:gap-4">
                    {{-- Jour --}}
                    <div>
                        <label class="block text-sm font-medium text-[#F8FAFC] max-md:text-xs" for="jour">
                            Jour
                        </label>

                        <select name="jour" id="jour" required
                            class="mt-2 block w-full rounded-lg border bg-[#1B1E21] px-3 py-2.5 text-sm text-[#F8FAFC] focus:outline-none focus:ring-2 transition-all duration-200  max-md:px-2.5  max-md:py-2 max-md:text-xs
                                 {{ $errors->has('libelle') ? 'border-red-500 focus:border-red-500 focus:ring-red-500/30' : 'border-[#3A3F45] focus:border-indigo-500 focus:ring-indigo-500/30' }}">
                            <option value="">-- Sélectionner un jour --</option>
                            <option value="lundi">Lundi</option>
                            <option value="mardi">Mardi</option>
                            <option value="mercredi">Mercredi</option>
                            <option value="jeudi">Jeudi</option>
                            <option value="vendredi">Vendredi</option>
                            <option value="samedi">Samedi</option>
                            <option value="dimanche">Dimanche</option>
                        </select>
                    </div>

                    {{-- Heure début --}}
                    <div>
                        <label class="block text-sm font-medium text-[#F8FAFC] max-md:text-xs" for="heure_debut">
                            Heure de début
                        </label>

                        <input type="time" name="heure_debut" id="heure_debut" required
                            class="mt-2 block w-full rounded-lg border bg-[#1B1E21] px-3 py-2.5 text-sm text-[#F8FAFC] focus:outline-none focus:ring-2 transition-all duration-200  max-md:px-2.5  max-md:py-2 max-md:text-xs
                                 {{ $errors->has('libelle') ? 'border-red-500 focus:border-red-500 focus:ring-red-500/30' : 'border-[#3A3F45] focus:border-indigo-500 focus:ring-indigo-500/30' }}">

                        @if ($errors->has('heure_debut'))
                            <p class="mt-1.5 text-xs text-red-400  max-md:text-[11px]">
                                {{ $errors->first('heure_debut') }}
                            </p>
                        @endif
                    </div>

                    {{-- Heure fin --}}
                    <div>
                        <label class="block text-sm font-medium text-[#F8FAFC] max-md:text-xs" for="heure_fin">
                            Heure de fin
                        </label>

                        <input type="time" name="heure_fin" id="heure_fin" required
                            class="mt-2 block w-full rounded-lg border bg-[#1B1E21] px-3 py-2.5 text-sm text-[#F8FAFC] focus:outline-none focus:ring-2 transition-all duration-200  max-md:px-2.5  max-md:py-2 max-md:text-xs
                                 {{ $errors->has('heure_fin') ? 'border-red-500 focus:border-red-500 focus:ring-red-500/30' : 'border-[#3A3F45] focus:border-indigo-500 focus:ring-indigo-500/30' }}">

                        @if ($errors->has('heure_fin'))
                            <p class="mt-1.5 text-xs text-red-400  max-md:text-[11px]">
                                {{ $errors->first('heure_fin') }}
                            </p>
                        @endif
                    </div>
                    <div class="mt-8 flex justify-end
                            max-md:mt-6
                            max-sm:mt-5
                            max-sm:w-full">

                        <button type="submit" class="inline-flex items-center justify-center
                               rounded-lg
                               bg-indigo-500
                               px-6 py-2.5
                               text-sm font-semibold text-white
                               transition-all duration-200
                               hover:bg-indigo-400
                               hover:shadow-lg hover:shadow-indigo-500/10
                               focus:outline-none
                               focus:ring-2 focus:ring-indigo-500
                               focus:ring-offset-2
                               focus:ring-offset-[#212427]
                               active:scale-[0.98]
                               cursor-pointer
                               max-md:px-5
                               max-md:py-2.5
                               max-md:text-xs
                               max-sm:w-full">

                            Ajouter le planning

                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="flex justify-between mt-4">
            <div>

                <h3 class="text-lg font-semibold text-[#F8FAFC]
                           max-md:text-base
                           max-sm:text-sm">
                    Liste des types activites
                </h3>

                <p class="mt-1 text-sm text-[#71717A]
                          max-md:text-xs">
                    Les types activites enregistrés apparaîtront ici.
                </p>
            </div>

            <div class="flex items-center gap-3 mt-4">

                {{-- Search --}}
                <form method="GET" action="/admin/plannings" role="search">

                    <div class="flex items-center w-72 h-11 rounded-lg
                    bg-white dark:bg-neutral-800
                    border border-slate-300 dark:border-neutral-700
                    shadow-sm
                    focus-within:ring-2 focus-within:ring-blue-500
                    focus-within:border-blue-500">

                        <label for="search" class="sr-only">Search</label>

                        <input type="search" id="search" name="search" placeholder="Search activite..."
                            value="{{ request('search') }}" class="w-full h-full px-4 text-sm
                       text-slate-900 dark:text-slate-50
                       bg-transparent outline-none
                       placeholder:text-slate-400" />

                        <button type="submit" aria-label="Search" class="flex items-center justify-center
                       w-11 h-11 shrink-0
                       bg-blue-600 hover:bg-blue-700
                       rounded-r-lg
                       transition-colors duration-200
                       cursor-pointer">

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
                    <a href="/admin/plannings" class="inline-flex items-center justify-center
                                                       h-11 px-4
                                                       text-sm font-medium
                                                       text-slate-700 dark:text-slate-200
                                                       bg-slate-100 dark:bg-neutral-700
                                                       border border-slate-300 dark:border-neutral-600
                                                       rounded-lg
                                                       hover:bg-slate-200 dark:hover:bg-neutral-600
                                                       transition-colors duration-200">
                        Cancel
                    </a>
                @endif

            </div>

        </div>

        <div
            class="max-w-270 m-auto  overflow-x-auto rounded-2xl border border-[#34383D] bg-[#1B1E21]/50 max-md:rounded-xl mt-6">

            <table class="w-full min-w-125 table-fixed text-left border-collapse">

                {{-- Header --}}
                <thead class="border-b border-[#34383D] bg-[#212427]">
                    <tr>
                        <th class="w-[70%] px-6 py-4 text-sm font-semibold text-[#F8FAFC] whitespace-nowrap
                           max-lg:px-4 max-lg:py-3
                           max-md:text-xs">
                            heure debut
                        </th>

                        <th class="w-[70%] px-6 py-4 text-sm font-semibold text-[#F8FAFC] whitespace-nowrap
                           max-lg:px-4 max-lg:py-3
                           max-md:text-xs">
                            heure fin
                        </th>

                        <th class="w-[70%] px-6 py-4 text-sm font-semibold text-[#F8FAFC] whitespace-nowrap
                           max-lg:px-4 max-lg:py-3
                           max-md:text-xs">
                            jour
                        </th>

                        <th class="w-[70%] px-6 py-4 text-sm font-semibold text-[#F8FAFC] text-center whitespace-nowrap
                           max-lg:px-4 max-lg:py-3
                           max-md:text-xs">
                            Actions
                        </th>
                    </tr>
                </thead>

                {{-- Body --}}
                <tbody class="divide-y divide-[#34383D]">

                    @forelse($plannings as $planning)
                        <tr class="transition-colors duration-200 hover:bg-[#24282C]">
                            <td
                                class="w-[70%] px-6 py-4 text-sm text-[#F8FAFC] whitespace-nowrap  max-lg:px-4 max-lg:py-3 max-md:text-xs">
                                {{ $planning->jour_semain }}
                            </td>

                            <td
                                class="w-[70%] px-6 py-4 text-sm text-[#F8FAFC] whitespace-nowrap  max-lg:px-4 max-lg:py-3 max-md:text-xs">
                                {{ $planning->heure_debut }}
                            </td>

                            <td
                                class="w-[70%] px-6 py-4 text-sm text-[#F8FAFC] whitespace-nowrap  max-lg:px-4 max-lg:py-3 max-md:text-xs">
                                {{ $planning->heure_fin }}
                            </td>

                            {{-- Actions --}}
                            <td class="w-[30%] px-6 py-4 max-lg:px-4 max-lg:py-3">

                                <div class="flex items-center justify-center gap-2">

                                    {{-- Edit --}}
                                    <button type="button" data-id="{{ $planning->id }}"
                                        class="edit-planning rounded-lg px-4 py-2  transition-all duration-200 active:scale-95 cursor-pointer max-md:px-3 max-md:py-1.5">
                                        <img class="h-6 w-6 max-md:h-5 max-md:w-5" src="{{ asset('icons/edit.svg') }}"
                                            alt="Edit">
                                    </button>

                                    {{-- Delete --}}
                                    <form method="POST" action="/admin/plannings/{{ $planning->id }}"
                                        onsubmit="return confirm('Are you sure ?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="rounded-lg px-4 py-2  transition-all duration-200 active:scale-95 cursor-pointer max-md:px-3 max-md:py-1.5">
                                            <img class="h-6 w-6 max-md:h-5 max-md:w-5" src="{{ asset('icons/delete.svg') }}"
                                                alt="Delete">
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="px-6 py-12 text-center text-sm text-[#71717A]">
                                Aucun planning trouvé.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{-- Pagination --}}
        <div class="mt-4 flex justify-center">
            {{ $plannings->links() }}
        </div>


        <!-- Planning modal -->
        <div id="planningModal"
            class="hidden fixed inset-0 z-50 w-full h-full items-center justify-center  bg-slate-950/60 backdrop-blur-md px-4">
            <div class="w-full max-w-2xl rounded-2xl bg-white shadow-2xl">

                <!-- Header -->
                <div
                    class="flex items-center justify-between border-b border-gray-200 bg-linear-to-r from-indigo-600 to-indigo-500 px-6 py-5">

                    <div>
                        <h2 class="text-xl font-bold text-white">
                            Éditer le planning
                        </h2>

                        <p class="mt-1 text-sm text-indigo-100">
                            Modifier le planning
                        </p>
                    </div>

                    <button type="button" id="closePlanningModal"
                        class="flex h-9 w-9 items-center justify-center rounded-full text-xl text-white cursor-pointer">
                        &times;
                    </button>

                </div>


                <!-- Form -->
                <form method="POST" id="planningForm" class="p-6">

                    @csrf
                    @method('PUT')

                    <input type="hidden" id="planningId">

                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">

                        <div>
                            <label for="planningJour" class="mb-2 block text-sm font-semibold text-slate-700">
                                jour
                            </label>

                            <input type="text" id="planningJour" name="planningJour" class="w-full rounded-xl border border-slate-300 bg-slate-50
                               px-4 py-3 text-slate-800 outline-none transition
                               placeholder:text-slate-400
                               focus:border-indigo-500 focus:bg-white
                               focus:ring-2 focus:ring-indigo-500/20">
                        </div>

                        <div>
                            <label for="planningHeureDebut" class="mb-2 block text-sm font-semibold text-slate-700">
                                Heure debut
                            </label>

                            <input type="text" id="planningHeureDebut" name="planningHeureDebut" class="w-full rounded-xl border border-slate-300 bg-slate-50
                               px-4 py-3 text-slate-800 outline-none transition
                               placeholder:text-slate-400
                               focus:border-indigo-500 focus:bg-white
                               focus:ring-2 focus:ring-indigo-500/20">
                        </div>

                        <div>
                            <label for="planningHeureFin" class="mb-2 block text-sm font-semibold text-slate-700">
                                Heure fin
                            </label>

                            <input type="text" id="planningHeureFin" name="planningHeureFin" class="w-full rounded-xl border border-slate-300 bg-slate-50
                               px-4 py-3 text-slate-800 outline-none transition
                               placeholder:text-slate-400
                               focus:border-indigo-500 focus:bg-white
                               focus:ring-2 focus:ring-indigo-500/20">
                        </div>



                    </div>

                    <!-- Buttons -->
                    <div class="mt-7 flex justify-end gap-3 border-t border-gray-200 pt-5">

                        <button type="button"
                            class="rounded-xl border border-slate-300 bg-white  px-5 py-2.5 text-sm font-semibold text-slate-700  transition hover:bg-slate-100">
                            <a href="/admin/plannings">
                                Annuler
                            </a>
                        </button>

                        <button type="submit"
                            class="rounded-xl bg-indigo-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm
                                 transition hover:bg-indigo-700 focus:outline-none focus:ring-2  focus:ring-indigo-500 focus:ring-offset-2 cursor-pointer">
                            Enregistrer
                        </button>

                    </div>

                </form>

            </div>
        </div>
    </div>

</x-admin.admin-dashboard-layout>