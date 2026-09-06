<x-responsable.responsable-dashboard-layout :title="$pageTitle">


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
                Gestion des adherents
            </h2>

            <p class="mt-1 text-sm text-[#A1A1AA]
                      max-md:text-xs">
                Ajoutez les adherents de votre salle de sport.
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
                    Ajouter un adherent
                </h3>

                <p class="mt-1 text-sm text-[#71717A]
                          max-md:text-xs">
                    Renseignez les informations du nouveau adherent.
                </p>

            </div>
            @if (session('success'))
                <div class=" m-7 flex items-center justify-between w-full max-w-sm gap-3 px-4 py-3 text-green-400 bg-green-500/10 border border-green-500/30 rounded-lg shadow-sm max-sm:p-2 max-md:max-w-full"
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

            @if ($errors->any())
                <div class="m-7 flex items-center justify-between w-full max-w-sm gap-3 px-4 py-3 text-red-400 bg-red-500/10 border border-red-500/30 rounded-lg shadow-sm max-sm:p-2 max-md:max-w-full"
                    role="alert">
                    <span class="text-red-400 font-semibold text-md text-center">
                        {{ $errors->first() }}
                    </span>
                    <button class="inline-flex text-white transition ease-in-out duration-150 cursor-pointer"
                        onclick="return this.parentNode.remove()">
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="red">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 011.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            @endif


            <form action="{{ route('responsable.adherents.store') }}" method="POST">

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

                        </div>

                        {{-- activité --}}
                        <div>
                            <label for="activite" class="block text-sm font-medium text-[#F8FAFC] max-md:text-xs">
                                Activité
                            </label>

                            <select id="activite" name="activite" required
                                class="mt-2 block w-full rounded-lg border
                       bg-[#1B1E21]
                       px-3 py-2.5
                       text-sm text-[#F8FAFC]
                       focus:outline-none focus:ring-2
                       transition-all duration-200
                       max-md:px-2.5
                       max-md:py-2
                       max-md:text-xs
                       {{ $errors->has('type') ? 'border-red-500 focus:border-red-500 focus:ring-red-500/30' : 'border-[#3A3F45] focus:border-indigo-500 focus:ring-indigo-500/30' }}">
                                <option value="">-- Sélectionner un type --</option>

                                @foreach($activites as $activite)
                                    <option value="{{ $activite->id }}" {{ old('type') == $activite->Libelle ? 'selected' : '' }}>
                                        {{ $activite->Libelle }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- abonnement -->
                        <div>
                            <label for="prixAbonnement" class="block text-sm font-medium text-[#F8FAFC]
                                       max-md:text-xs">
                                Prix abonnement
                            </label>

                            <input id="prixAbonnement" type="number" name="prixAbonnement" required
                                value="{{ old('prixAbonnement') }}"
                                class="mt-2 block w-full rounded-lg border
                                       bg-[#1B1E21]
                                       px-3 py-2.5
                                       text-sm text-[#F8FAFC]
                                       focus:outline-none focus:ring-2
                                       transition-all duration-200

                                       max-md:px-2.5
                                       max-md:py-2
                                       max-md:text-xs

                                       {{ $errors->has('abonnement') ? 'border-red-500 focus:border-red-500 focus:ring-red-500/30' : 'border-[#3A3F45] focus:border-indigo-500 focus:ring-indigo-500/30' }}">

                        </div>

                        {{-- type abonnement --}}
                        <div>
                            <label for="typeAbon" class="block text-sm font-medium text-[#F8FAFC] max-md:text-xs">
                                Type abonnement
                            </label>

                            <select id="typeAbon" name="typeAbon" required
                                class="mt-2 block w-full rounded-lg border
                       bg-[#1B1E21]
                       px-3 py-2.5
                       text-sm text-[#F8FAFC]
                       focus:outline-none focus:ring-2
                       transition-all duration-200
                       max-md:px-2.5
                       max-md:py-2
                       max-md:text-xs
                       {{ $errors->has('typeAbon') ? 'border-red-500 focus:border-red-500 focus:ring-red-500/30' : 'border-[#3A3F45] focus:border-indigo-500 focus:ring-indigo-500/30' }}">
                                <option value="">-- Sélectionner un type --</option>

                                @foreach($typAbonnements as $type)
                                    <option value="{{ $type->id }}" {{ old('typeAbon') == $type->Libelle ? 'selected' : '' }}>
                                        {{ $type->Libelle }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Assurance -->
                        <div>
                            <label for="prixAssurance" class="block text-sm font-medium text-[#F8FAFC] max-md:text-xs">
                                Prix assurance
                            </label>

                            <input id="assurance" type="number" name="prixAssurance" required
                                value="{{ old('prixAssurance') }}"
                                class="mt-2 block w-full rounded-lg border
                                       bg-[#1B1E21]
                                       px-3 py-2.5
                                       text-sm text-[#F8FAFC]
                                       focus:outline-none focus:ring-2
                                       transition-all duration-200

                                       max-md:px-2.5
                                       max-md:py-2
                                       max-md:text-xs

                                       {{ $errors->has('prixAssurance') ? 'border-red-500 focus:border-red-500 focus:ring-red-500/30' : 'border-[#3A3F45] focus:border-indigo-500 focus:ring-indigo-500/30' }}">

                        </div>


                        {{-- Date debut --}}
                        <div>

                            <label for="dateDebut" class="block text-sm font-medium text-[#F8FAFC]
                                       max-md:text-xs">
                                Date debut
                            </label>

                            <input id="dateDebut" type="date" name="dateDebut" required value="{{ old('date') }}"
                                class="mt-2 block w-full rounded-lg border
                                       bg-[#1B1E21]
                                       px-3 py-2.5
                                       text-sm text-[#F8FAFC]
                                       focus:outline-none focus:ring-2
                                       transition-all duration-200

                                       max-md:px-2.5
                                       max-md:py-2
                                       max-md:text-xs

                                       {{ $errors->has('dateDebut') ? 'border-red-500 focus:border-red-500 focus:ring-red-500/30' : 'border-[#3A3F45] focus:border-indigo-500 focus:ring-indigo-500/30' }}">

                        </div>
                    </div>

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

                        Ajouter l'adherent

                    </button>

                </div>
            </form>
        </div>
    </div>

</x-responsable.responsable-dashboard-layout>