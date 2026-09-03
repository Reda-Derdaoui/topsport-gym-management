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
                Gestion des responsables
            </h2>

            <p class="mt-1 text-sm text-[#A1A1AA]
                      max-md:text-xs">
                Ajoutez et gérez les responsables de votre salle de sport.
            </p>

        </div>


        {{-- Add Responsable --}}
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
                    Ajouter un responsable
                </h3>

                <p class="mt-1 text-sm text-[#71717A]
                          max-md:text-xs">
                    Renseignez les informations du nouveau responsable.
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

            <form action="/admin/responsables" method="POST">

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

                            <label for="prenom" class="block text-sm font-medium text-[#F8FAFC]
                                       max-md:text-xs">
                                Prénom
                            </label>

                            <input id="prenom" type="text" name="prenom" required autocomplete="given-name"
                                value="{{ old('prenom') }}" class="mt-2 block w-full rounded-lg border
                                       bg-[#1B1E21]
                                       px-3 py-2.5
                                       text-sm text-[#F8FAFC]
                                       focus:outline-none focus:ring-2
                                       transition-all duration-200

                                       max-md:px-2.5
                                       max-md:py-2
                                       max-md:text-xs

                                       {{ $errors->has('prenom') ? 'border-red-500 focus:border-red-500 focus:ring-red-500/30' : 'border-[#3A3F45] focus:border-indigo-500 focus:ring-indigo-500/30'
                                       }}">

                            @if ($errors->has('prenom'))
                                <p class="mt-1.5 text-xs text-red-400 max-md:text-[11px]">
                                    {{ $errors->first('prenom') }}
                                </p>
                            @endif

                        </div>


                        {{-- Téléphone --}}
                        <div>

                            <label for="tele" class="block text-sm font-medium text-[#F8FAFC]
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

                            <label for="date" class="block text-sm font-medium text-[#F8FAFC]
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

                    </div>

                </div>


                {{-- Login information --}}
                <div class="mt-8
                            border-t border-[#34383D]
                            pt-6
                            max-lg:mt-7
                            max-md:mt-6
                            max-md:pt-5">

                    <h4 class="mb-4 text-sm font-semibold uppercase tracking-wider text-[#A1A1AA] max-md:text-xs">
                        Informations de connexion
                    </h4>


                    <div class="grid grid-cols-2 gap-5
                                max-lg:gap-4
                                max-md:grid-cols-1
                                max-md:gap-4">

                        {{-- Email --}}
                        <div>

                            <label for="email" class="block text-sm font-medium text-[#F8FAFC]
                                       max-md:text-xs">
                                Adresse email
                            </label>

                            <input id="email" type="email" name="email" required autocomplete="email"
                                value="{{ old('email') }}" placeholder="responsable@example.com"
                                class="mt-2 block w-full rounded-lg border
                                       bg-[#1B1E21]
                                       px-3 py-2.5
                                       text-sm text-[#F8FAFC]
                                       placeholder:text-[#71717A]
                                       focus:outline-none focus:ring-2
                                       transition-all duration-200
                                       max-md:px-2.5
                                       max-md:py-2
                                       max-md:text-xs
                                       {{ $errors->has('email') ? 'border-red-500 focus:border-red-500 focus:ring-red-500/30' : 'border-[#3A3F45] focus:border-indigo-500 focus:ring-indigo-500/30' }}">

                            @if ($errors->has('email'))
                                <p class="mt-1.5 text-xs text-red-400 max-md:text-[11px]">
                                    {{ $errors->first('email') }}
                                </p>
                            @endif

                        </div>


                        {{-- Password --}}
                        <div>

                            <label for="password" class="block text-sm font-medium text-[#F8FAFC]
                                       max-md:text-xs">
                                Mot de passe
                            </label>

                            <input id="password" type="password" name="password" required autocomplete="new-password"
                                placeholder="••••••••"
                                class="mt-2 block w-full rounded-lg border
                                       bg-[#1B1E21]
                                       px-3 py-2.5
                                       text-sm text-[#F8FAFC]
                                       placeholder:text-[#71717A]
                                       focus:outline-none focus:ring-2
                                       transition-all duration-200
                                       max-md:px-2.5
                                       max-md:py-2
                                       max-md:text-xs
                                       {{ $errors->has('password') ? 'border-red-500 focus:border-red-500 focus:ring-red-500/30' : 'border-[#3A3F45] focus:border-indigo-500 focus:ring-indigo-500/30' }}">

                            @if ($errors->has('password'))
                                <p class="mt-1.5 text-xs text-red-400 max-md:text-[11px]">
                                    {{ $errors->first('password') }}
                                </p>
                            @endif

                            <label for="password" class="block text-sm font-medium text-[#F8FAFC]
                                       max-md:text-xs mt-3">
                                Confirmer le mot de passe
                            </label>
                            <input id="password_confirmation" type="password" name="password_confirmation" required
                                autocomplete="new-password" placeholder="••••••••"
                                class="mt-2 block w-full rounded-lg border
                                       bg-[#1B1E21]
                                       px-3 py-2.5
                                       text-sm text-[#F8FAFC]
                                       placeholder:text-[#71717A]
                                       focus:outline-none focus:ring-2
                                       transition-all duration-200
                                       max-md:px-2.5
                                       max-md:py-2
                                       max-md:text-xs
                                       {{ $errors->has('password') ? 'border-red-500 focus:border-red-500 focus:ring-red-500/30' : 'border-[#3A3F45] focus:border-indigo-500 focus:ring-indigo-500/30' }}">

                            @if ($errors->has('password'))
                                <p class="mt-1.5 text-xs text-red-400  max-md:text-[11px]">
                                    {{ $errors->first('password') }}
                                </p>
                            @endif

                        </div>

                    </div>

                </div>


                {{-- Submit --}}
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

                        Ajouter le responsable

                    </button>

                </div>

            </form>

        </div>


        {{-- Responsable list --}}
        <div class="mt-10
                    max-lg:mt-8
                    max-md:mt-7
                    max-sm:mt-6">

            <div class="mb-4">

                <h3 class="text-lg font-semibold text-[#F8FAFC]
                           max-md:text-base
                           max-sm:text-sm">
                    Liste des responsables
                </h3>

                <p class="mt-1 text-sm text-[#71717A]
                          max-md:text-xs">
                    Les responsables enregistrés apparaîtront ici.
                </p>

            </div>


            {{-- TABLE WILL GO HERE LATER --}}
            <div class="w-full overflow-x-auto rounded-2xl border border-[#34383D] bg-[#1B1E21]/50
            max-md:rounded-xl">

                <table class="w-full min-w-212.5 text-left border-collapse">

                    {{-- Header --}}
                    <thead class="border-b border-[#34383D] bg-[#212427]">
                        <tr>
                            <th class="px-6 py-4 text-sm font-semibold text-[#F8FAFC] whitespace-nowrap
                           max-lg:px-4 max-lg:py-3
                           max-md:text-xs">
                                Nom
                            </th>

                            <th class="px-6 py-4 text-sm font-semibold text-[#F8FAFC] whitespace-nowrap
                           max-lg:px-4 max-lg:py-3
                           max-md:text-xs">
                                Prenom
                            </th>

                            <th class="px-6 py-4 text-sm font-semibold text-[#F8FAFC] whitespace-nowrap
                           max-lg:px-4 max-lg:py-3
                           max-md:text-xs">
                                Telephone
                            </th>

                            <th class="px-6 py-4 text-sm font-semibold text-[#F8FAFC] whitespace-nowrap
                           max-lg:px-4 max-lg:py-3
                           max-md:text-xs">
                                Date naissance
                            </th>

                            <th class="px-6 py-4 text-sm font-semibold text-[#F8FAFC] whitespace-nowrap
                           max-lg:px-4 max-lg:py-3
                           max-md:text-xs">
                                Admin
                            </th>

                            <th class="px-6 py-4 text-sm font-semibold text-[#F8FAFC] text-center whitespace-nowrap
                           max-lg:px-4 max-lg:py-3
                           max-md:text-xs">
                                Actions
                            </th>
                        </tr>
                    </thead>

                    {{-- Body --}}
                    <tbody class="divide-y divide-[#34383D]">

                        @forelse ($responsables as $responsable)

                            <tr class="transition-colors duration-200 hover:bg-[#24282C]">

                                <td
                                    class="px-6 py-4 text-sm text-[#F8FAFC] whitespace-nowrap max-lg:px-4 max-lg:py-3 max-md:text-xs">
                                    {{ $responsable->personne->Nom }}
                                </td>

                                <td
                                    class="px-6 py-4 text-sm text-[#F8FAFC] whitespace-nowrap    max-lg:px-4 max-lg:py-3  max-md:text-xs">
                                    {{ $responsable->personne->Prenom }}
                                </td>

                                <td
                                    class="px-6 py-4 text-sm text-[#A1A1AA] whitespace-nowrap max-lg:px-4 max-lg:py-3    max-md:text-xs">
                                    {{ $responsable->personne->Tele }}
                                </td>

                                <td
                                    class="px-6 py-4 text-sm text-[#A1A1AA] whitespace-nowrap max-lg:px-4 max-lg:py-3  maxmd:text-xs">
                                    {{ $responsable->personne->DateNaissance }}
                                </td>

                                <td
                                    class="px-6 py-4 text-sm text-[#3B82F6] font-medium whitespace-nowrap   max-lg:px-4 max-lg:py-3   max-md:text-xs">
                                    {{ $responsable->admin->personne->Prenom }}
                                </td>

                                {{-- Actions --}}
                                <td class="px-6 py-4 max-lg:px-4 max-lg:py-3">

                                    <div class="flex items-center justify-center max-md:gap-2">

                                        <button type="button" data-id="{{ $responsable->id }}"
                                            class=" edit-responsable rounded-lg px-4 py-2 text-sm font-semibold text-white transition-all duration-200  active:scale-95  cursor-pointer  max-md:px-3 max-md:py-1.5  max-md:text-xs">
                                            <img class="h-6 w-6 max-md:h-5 max-md:w-5 max-sm:h-5 max-sm:w-5"
                                                src="{{ asset('icons/edit.svg') }}" alt="Edit">
                                        </button>

                                        <form method="POST" action="/admin/responsables/{{ $responsable->id }}"
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
                                    Aucun responsable trouvé.
                                </td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>
            </div>

            {{-- Pagination --}}
            <div class="mt-3 flex justify-center">
                {{ $responsables->links() }}
            </div>

            <!-- Responsable Modal -->
            <div id="responsableModal"
                class="hidden fixed inset-0 z-50 w-full h-full items-center justify-center  bg-slate-950/60 backdrop-blur-md px-4">
                <div class="w-full max-w-2xl rounded-2xl bg-white shadow-2xl">

                    <!-- Header -->
                    <div
                        class="flex items-center justify-between border-b border-gray-200 bg-linear-to-r from-indigo-600 to-indigo-500 px-6 py-5">

                        <div>
                            <h2 id="responsableModalTitle" class="text-xl font-bold text-white">
                                Éditer le Responsable
                            </h2>

                            <p class="mt-1 text-sm text-indigo-100">
                                Modifier les informations du responsable
                            </p>
                        </div>

                        <button type="button" id="closeResponsableModal"
                            class="flex h-9 w-9 items-center justify-center rounded-full text-xl text-white cursor-pointer">
                            &times;
                        </button>

                    </div>


                    <!-- Form -->
                    <form method="POST" id="responsableForm" class="p-6">

                        @csrf
                        @method('PUT')

                        <input type="hidden" id="resId">

                        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">

                            <!-- Nom -->
                            <div>
                                <label for="resNom" class="mb-2 block text-sm font-semibold text-slate-700">
                                    Nom
                                </label>

                                <input type="text" id="resNom" name="nom" class="w-full rounded-xl border border-slate-300 bg-slate-50
                               px-4 py-3 text-slate-800 outline-none transition
                               placeholder:text-slate-400
                               focus:border-indigo-500 focus:bg-white
                               focus:ring-2 focus:ring-indigo-500/20">
                            </div>


                            <!-- Prénom -->
                            <div>
                                <label for="resPrenom" class="mb-2 block text-sm font-semibold text-slate-700">
                                    Prénom
                                </label>

                                <input type="text" id="resPrenom" name="prenom" class="w-full rounded-xl border border-slate-300 bg-slate-50
                               px-4 py-3 text-slate-800 outline-none transition
                               focus:border-indigo-500 focus:bg-white
                               focus:ring-2 focus:ring-indigo-500/20">
                            </div>


                            <!-- Téléphone -->
                            <div>
                                <label for="resPhone" class="mb-2 block text-sm font-semibold text-slate-700">
                                    Téléphone
                                </label>

                                <input type="text" id="resPhone" name="tele" class="w-full rounded-xl border border-slate-300 bg-slate-50
                               px-4 py-3 text-slate-800 outline-none transition
                               focus:border-indigo-500 focus:bg-white
                               focus:ring-2 focus:ring-indigo-500/20">
                            </div>


                            <!-- Date de naissance -->
                            <div>
                                <label for="resDateNaissance" class="mb-2 block text-sm font-semibold text-slate-700">
                                    Date de naissance
                                </label>

                                <input type="date" id="resDateNaissance" name="date" class="w-full rounded-xl border border-slate-300 bg-slate-50
                               px-4 py-3 text-slate-800 outline-none transition
                               focus:border-indigo-500 focus:bg-white
                               focus:ring-2 focus:ring-indigo-500/20">
                            </div>

                        </div>


                        <!-- Buttons -->
                        <div class="mt-7 flex justify-end gap-3 border-t border-gray-200 pt-5">

                            <button type="button"
                                class="rounded-xl border border-slate-300 bg-white  px-5 py-2.5 text-sm font-semibold text-slate-700  transition hover:bg-slate-100">
                                <a href="/admin/responsables">Annuler</a>
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

    </div>

</x-admin.admin-dashboard-layout>