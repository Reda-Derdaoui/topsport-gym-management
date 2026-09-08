<x-admin.admin-dashboard-layout :title="$pageTitle">
    <div
        class="w-full max-w-6xl mx-auto
                px-6 py-6
                max-2xl:px-5
                max-xl:px-5
                max-lg:px-4
                max-md:px-3
                max-sm:px-2">

        {{-- Header --}}
        <div class="mb-6 max-lg:mb-5 max-md:mb-4">

            <h2
                class="text-2xl font-semibold text-[#F8FAFC]
                       max-lg:text-xl
                       max-md:text-lg
                       max-sm:text-base">
                Gestion des entraineurs
            </h2>

            <p class="mt-1 text-sm text-[#A1A1AA]
                      max-md:text-xs">
                Ajoutez et gérez les entraineurs de votre salle de sport.
            </p>

        </div>


        {{-- Add Responsable --}}
        <div
            class="w-full
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

                <h3
                    class="text-lg font-semibold text-[#F8FAFC]
                           max-md:text-base
                           max-sm:text-sm">
                    Ajouter un entraineur
                </h3>

                <p class="mt-1 text-sm text-[#71717A]
                          max-md:text-xs">
                    Renseignez les informations du nouveau entraineur.
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

            <form action="/admin/entraineurs" method="POST">

                @csrf


                {{-- Informations personnelles --}}
                <div>

                    <h4 class="mb-4 text-sm font-semibold uppercase tracking-wider text-[#A1A1AA] max-md:text-xs mt-2">
                        Informations personnelles
                    </h4>


                    {{-- Fields --}}
                    <div class="grid grid-cols-2 gap-5  max-lg:gap-4 max-md:grid-cols-1  max-md:gap-4">

                        {{-- Nom --}}
                        <div>

                            <label for="nom" class="block text-sm font-medium text-[#F8FAFC] max-md:text-xs">
                                Nom
                            </label>

                            <input id="nom" type="text" name="nom" required autocomplete="family-name"
                                value="{{ old('nom') }}"
                                class="mt-2 block w-full rounded-lg border bg-[#1B1E21] px-3 py-2.5 text-sm text-[#F8FAFC] focus:outline-none focus:ring-2 transition-all duration-200  max-md:px-2.5  max-md:py-2 max-md:text-xs

                                       {{ $errors->has('nom') ? 'border-red-500 focus:border-red-500 focus:ring-red-500/30' : 'border-[#3A3F45] focus:border-indigo-500 focus:ring-indigo-500/30' }}">

                            @if ($errors->has('nom'))
                                <p class="mt-1.5 text-xs text-red-400  max-md:text-[11px]">
                                    {{ $errors->first('nom') }}
                                </p>
                            @endif

                        </div>


                        {{-- Prénom --}}
                        <div>

                            <label for="prenom"
                                class="block text-sm font-medium text-[#F8FAFC]
                                       max-md:text-xs">
                                Prénom
                            </label>

                            <input id="prenom" type="text" name="prenom" required autocomplete="given-name"
                                value="{{ old('prenom') }}"
                                class="mt-2 block w-full rounded-lg border
                                       bg-[#1B1E21]
                                       px-3 py-2.5
                                       text-sm text-[#F8FAFC]
                                       focus:outline-none focus:ring-2
                                       transition-all duration-200

                                       max-md:px-2.5
                                       max-md:py-2
                                       max-md:text-xs

                                       {{ $errors->has('prenom') ? 'border-red-500 focus:border-red-500 focus:ring-red-500/30' : 'border-[#3A3F45] focus:border-indigo-500 focus:ring-indigo-500/30' }}">

                            @if ($errors->has('prenom'))
                                <p class="mt-1.5 text-xs text-red-400 max-md:text-[11px]">
                                    {{ $errors->first('prenom') }}
                                </p>
                            @endif

                        </div>


                        {{-- Téléphone --}}
                        <div>

                            <label for="tele"
                                class="block text-sm font-medium text-[#F8FAFC]
                                       max-md:text-xs">
                                Téléphone
                            </label>

                            <input id="tele" type="text" name="tele" required autocomplete="tel"
                                value="{{ old('tele') }}"
                                class="mt-2 block w-full rounded-lg border
                                       bg-[#1B1E21]
                                       px-3 py-2.5
                                       text-sm text-[#F8FAFC]
                                       focus:outline-none focus:ring-2
                                       transition-all duration-200

                                       max-md:px-2.5
                                       max-md:py-2
                                       max-md:text-xs

                                       {{ $errors->has('tele') ? 'border-red-500 focus:border-red-500 focus:ring-red-500/30' : 'border-[#3A3F45] focus:border-indigo-500 focus:ring-indigo-500/30' }}">

                            @if ($errors->has('tele'))
                                <p class="mt-1.5 text-xs text-red-400  max-md:text-[11px]">
                                    {{ $errors->first('tele') }}
                                </p>
                            @endif

                        </div>


                        {{-- Date --}}
                        <div>

                            <label for="date"
                                class="block text-sm font-medium text-[#F8FAFC]
                                       max-md:text-xs">
                                Date de naissance
                            </label>

                            <input id="date" type="date" name="date" required value="{{ old('date') }}"
                                class="mt-2 block w-full rounded-lg border
                                       bg-[#1B1E21]
                                       px-3 py-2.5
                                       text-sm text-[#F8FAFC]
                                       focus:outline-none focus:ring-2
                                       transition-all duration-200

                                       max-md:px-2.5
                                       max-md:py-2
                                       max-md:text-xs

                                       {{ $errors->has('date') ? 'border-red-500 focus:border-red-500 focus:ring-red-500/30' : 'border-[#3A3F45] focus:border-indigo-500 focus:ring-indigo-500/30' }}">

                            @if ($errors->has('date'))
                                <p class="mt-1.5 text-xs text-red-400 max-md:text-[11px]">
                                    {{ $errors->first('date') }}
                                </p>
                            @endif

                        </div>

                        <!-- Specialite -->

                        <div>

                            <label for="date"
                                class="block text-sm font-medium text-[#F8FAFC]
                                       max-md:text-xs">
                                Specialite
                            </label>

                            <input id="specialite" type="text" name="specialite" required
                                value="{{ old('specialite') }}"
                                class="mt-2 block w-full rounded-lg border
                                       bg-[#1B1E21]
                                       px-3 py-2.5
                                       text-sm text-[#F8FAFC]
                                       focus:outline-none focus:ring-2
                                       transition-all duration-200

                                       max-md:px-2.5
                                       max-md:py-2
                                       max-md:text-xs

                                       {{ $errors->has('specialite') ? 'border-red-500 focus:border-red-500 focus:ring-red-500/30' : 'border-[#3A3F45] focus:border-indigo-500 focus:ring-indigo-500/30' }}">

                            @if ($errors->has('date'))
                                <p class="mt-1.5 text-xs text-red-400 max-md:text-[11px]">
                                    {{ $errors->first('specialite') }}
                                </p>
                            @endif

                        </div>

                    </div>
                </div>
                {{-- Submit --}}
                <div
                    class="mt-8 flex justify-end
                            max-md:mt-6
                            max-sm:mt-5
                            max-sm:w-full">

                    <button type="submit"
                        class="inline-flex items-center justify-center
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

                        Ajouter l'entraineur

                    </button>

                </div>
            </form>
        </div>





        {{-- entraineur list --}}
        <div class="mt-10 max-lg:mt-8 max-md:mt-7 max-sm:mt-6">

            <div class="flex justify-between max-md:flex-col max-md:justify-between max-md:items-center">

                <div class="mb-4">

                    <h3 class="text-lg font-semibold text-[#F8FAFC] max-md:text-base max-sm:text-sm">
                        Liste des entraineurs
                    </h3>

                    <p class="mt-1 text-sm text-[#71717A]  max-md:text-xs">
                        Les entraineurs enregistrés apparaîtront ici.
                    </p>

                </div>

                <div class="flex flex-wrap items-center gap-3 mt-4 max-sm:flex-col max-sm:items-stretch">

                    {{-- Search --}}
                    <form method="GET" action="/admin/entraineurs" role="search"
                        class="flex-1 min-w-0 max-sm:w-full">

                        <div
                            class="flex items-center w-72 max-md:w-64 max-sm:w-full h-11 rounded-lg  bg-white dark:bg-neutral-800 border border-slate-300 dark:border-neutral-700 shadow-sm  focus-within:ring-2 focus-within:ring-blue-500 focus-within:border-blue-500">

                            <label for="search" class="sr-only">Search</label>

                            <input type="search" id="search" name="search" placeholder="Search type activite..."
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
                    @if (request('search'))
                        <a href="/admin/entraineurs"
                            class="inline-flex items-center justify-center  h-11 px-4   text-sm font-medium   text-slate-700 dark:text-slate-200 bg-slate-100 dark:bg-neutral-700 border border-slate-300 dark:border-neutral-600 rounded-lg   hover:bg-slate-200 dark:hover:bg-neutral-600 transition-colors duration-200 shrink-0 max-sm:w-full max-sm:h-10">
                            Cancel
                        </a>
                    @endif

                </div>
            </div>



            <div class="w-full overflow-x-auto rounded-2xl border border-[#34383D] bg-[#1B1E21]/50 max-md:rounded-xl">

                <table class="w-full min-w-212.5 text-left border-collapse">

                    {{-- Header --}}
                    <thead class="border-b border-[#34383D] bg-[#212427]">
                        <tr>
                            <th
                                class="px-6 py-4 text-sm font-semibold text-[#F8FAFC] whitespace-nowrap
                           max-lg:px-4 max-lg:py-3
                           max-md:text-xs">
                                Nom
                            </th>

                            <th
                                class="px-6 py-4 text-sm font-semibold text-[#F8FAFC] whitespace-nowrap
                           max-lg:px-4 max-lg:py-3
                           max-md:text-xs">
                                Prenom
                            </th>

                            <th
                                class="px-6 py-4 text-sm font-semibold text-[#F8FAFC] whitespace-nowrap
                           max-lg:px-4 max-lg:py-3
                           max-md:text-xs">
                                Telephone
                            </th>

                            <th
                                class="px-6 py-4 text-sm font-semibold text-[#F8FAFC] whitespace-nowrap
                           max-lg:px-4 max-lg:py-3
                           max-md:text-xs">
                                Date naissance
                            </th>

                            <th
                                class="px-6 py-4 text-sm font-semibold text-[#F8FAFC] whitespace-nowrap
                           max-lg:px-4 max-lg:py-3
                           max-md:text-xs">
                                Specialite
                            </th>

                            <th
                                class="px-6 py-4 text-sm font-semibold text-[#F8FAFC] whitespace-nowrap
                           max-lg:px-4 max-lg:py-3
                           max-md:text-xs">
                                Admin
                            </th>


                            <th
                                class="px-6 py-4 text-sm font-semibold text-[#F8FAFC] text-center whitespace-nowrap
                           max-lg:px-4 max-lg:py-3
                           max-md:text-xs">
                                Actions
                            </th>
                        </tr>
                    </thead>

                    {{-- Body --}}
                    <tbody class="divide-y divide-[#34383D]">

                        @forelse ($entraineurs as $entraineur)
                            <tr class="transition-colors duration-200 hover:bg-[#24282C]">

                                <td
                                    class="px-6 py-4 text-sm text-[#F8FAFC] whitespace-nowrap max-lg:px-4 max-lg:py-3 max-md:text-xs">
                                    {{ $entraineur->personne->Nom }}
                                </td>

                                <td
                                    class="px-6 py-4 text-sm text-[#F8FAFC] whitespace-nowrap    max-lg:px-4 max-lg:py-3  max-md:text-xs">
                                    {{ $entraineur->personne->Prenom }}
                                </td>

                                <td
                                    class="px-6 py-4 text-sm text-[#A1A1AA] whitespace-nowrap max-lg:px-4 max-lg:py-3    max-md:text-xs">
                                    {{ $entraineur->personne->Tele }}
                                </td>

                                <td
                                    class="px-6 py-4 text-sm text-[#A1A1AA] whitespace-nowrap max-lg:px-4 max-lg:py-3  maxmd:text-xs">
                                    {{ $entraineur->personne->DateNaissance }}
                                </td>

                                <td
                                    class="px-6 py-4 text-sm text-[#A1A1AA] whitespace-nowrap max-lg:px-4 max-lg:py-3  maxmd:text-xs">
                                    {{ $entraineur->Specialite }}
                                </td>

                                <td
                                    class="px-6 py-4 text-sm text-[#3B82F6] font-medium whitespace-nowrap   max-lg:px-4 max-lg:py-3   max-md:text-xs">
                                    {{ $entraineur->admin->personne->Prenom }}
                                </td>

                                {{-- Actions --}}
                                <td class="px-6 py-4 max-lg:px-4 max-lg:py-3">

                                    <div class="flex items-center justify-center max-md:gap-2">

                                        <button type="button" data-id="{{ $entraineur->id }}"
                                            class=" edit-entraineur rounded-lg px-4 py-2 text-sm font-semibold text-white transition-all duration-200  active:scale-95  cursor-pointer  max-md:px-3 max-md:py-1.5  max-md:text-xs">
                                            <img class="h-6 w-6 max-md:h-5 max-md:w-5 max-sm:h-5 max-sm:w-5"
                                                src="{{ asset('icons/edit.svg') }}" alt="Edit">
                                        </button>

                                        <form method="POST" action="/admin/entraineurs/{{ $entraineur->id }}"
                                            onsubmit="return confirm('Are you sure ?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                class="rounded-lg px-4 py-2 text-sm font-semibold text-white transition-all duration-200 active:scale-95 cursor-pointer max-md:px-3 max-md:py-1.5 max-md:text-xs">
                                                <img class="h-6 w-6 max-md:h-5 max-md:w-5 max-sm:h-5 max-sm:w-5"
                                                    src="{{ asset('icons/delete.svg') }}" alt="">
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center text-sm text-[#71717A]">
                                    Aucun entraineur trouvé.
                                </td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>
            </div>

            {{-- Pagination --}}
            <div class="mt-3 flex justify-center">
                {{ $entraineurs->links() }}
            </div>


            <div id="entraineurModal"
                class="hidden fixed inset-0 z-50 w-full h-full items-center justify-center  bg-slate-950/60 backdrop-blur-md px-4">
                <div class="w-full max-w-2xl rounded-2xl bg-white shadow-2xl">

                    <!-- Header -->
                    <div
                        class="flex items-center justify-between border-b border-gray-200 bg-linear-to-r from-indigo-600 to-indigo-500 px-6 py-5">

                        <div>
                            <h2 id="entraineurModalTitle" class="text-xl font-bold text-white">
                                Éditer le Responsable
                            </h2>

                            <p class="mt-1 text-sm text-indigo-100">
                                Modifier les informations du responsable
                            </p>
                        </div>

                        <button type="button" id="closeEntraineurModal"
                            class="flex h-9 w-9 items-center justify-center rounded-full text-xl text-white cursor-pointer">
                            &times;
                        </button>

                    </div>


                    <!-- Form -->
                    <form method="POST" id="entponsableForm" class="p-6">

                        @csrf
                        @method('PUT')

                        <input type="hidden" id="entId">

                        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">

                            <!-- Nom -->
                            <div>
                                <label for="entNom" class="mb-2 block text-sm font-semibold text-slate-700">
                                    Nom
                                </label>

                                <input type="text" id="entNom" name="nom"
                                    class="w-full rounded-xl border border-slate-300 bg-slate-50
                               px-4 py-3 text-slate-800 outline-none transition
                               placeholder:text-slate-400
                               focus:border-indigo-500 focus:bg-white
                               focus:ring-2 focus:ring-indigo-500/20">
                            </div>


                            <!-- Prénom -->
                            <div>
                                <label for="entPrenom" class="mb-2 block text-sm font-semibold text-slate-700">
                                    Prénom
                                </label>

                                <input type="text" id="entPrenom" name="prenom"
                                    class="w-full rounded-xl border border-slate-300 bg-slate-50
                               px-4 py-3 text-slate-800 outline-none transition
                               focus:border-indigo-500 focus:bg-white
                               focus:ring-2 focus:ring-indigo-500/20">
                            </div>


                            <!-- Téléphone -->
                            <div>
                                <label for="entPhone" class="mb-2 block text-sm font-semibold text-slate-700">
                                    Téléphone
                                </label>

                                <input type="text" id="entPhone" name="tele"
                                    class="w-full rounded-xl border border-slate-300 bg-slate-50
                               px-4 py-3 text-slate-800 outline-none transition
                               focus:border-indigo-500 focus:bg-white
                               focus:ring-2 focus:ring-indigo-500/20">
                            </div>


                            <!-- Date de naissance -->
                            <div>
                                <label for="entDateNaissance" class="mb-2 block text-sm font-semibold text-slate-700">
                                    Date de naissance
                                </label>

                                <input type="date" id="entDateNaissance" name="date"
                                    class="w-full rounded-xl border border-slate-300 bg-slate-50
                               px-4 py-3 text-slate-800 outline-none transition
                               focus:border-indigo-500 focus:bg-white
                               focus:ring-2 focus:ring-indigo-500/20">
                            </div>

                            <div>
                                <label for="entScpecialite" class="mb-2 block text-sm font-semibold text-slate-700">
                                    Specialite
                                </label>

                                <input type="text" id="entSpecialite" name="specialite"
                                    class="w-full rounded-xl border border-slate-300 bg-slate-50
                               px-4 py-3 text-slate-800 outline-none transition
                               focus:border-indigo-500 focus:bg-white
                               focus:ring-2 focus:ring-indigo-500/20">
                            </div>

                        </div>


                        <!-- Buttons -->
                        <div class="mt-7 flex justify-end gap-3 border-t border-gray-200 pt-5">

                            <button type="button"
                                class="rounded-xl border border-slate-300 bg-white  px-5 py-2.5 text-sm font-semibold text-slate-700  transition hover:bg-slate-100">
                                <a href="/admin/entraineurs">Annuler</a>
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
