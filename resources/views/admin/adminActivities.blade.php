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
                Gestion des activité
            </h2>

            <p class="mt-1 text-sm text-[#A1A1AA]
                      max-md:text-xs">
                Ajoutez et gérez les activités de votre salle de sport.
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

        <form action="/admin/activities" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                {{-- Nom de l'activité --}}
                <div>
                    <label for="nom" class="block text-sm font-medium text-[#F8FAFC] max-md:text-xs">
                        Nom de l'activité
                    </label>

                    <input type="text" id="nom" name="nom" value="{{ old('nom') }}" placeholder="Ex: Karate" required
                        class="mt-2 block w-full rounded-lg border
                       bg-[#1B1E21]
                       px-3 py-2.5
                       text-sm text-[#F8FAFC]
                       placeholder-[#71717A]
                       focus:outline-none focus:ring-2
                       transition-all duration-200
                       max-md:px-2.5
                       max-md:py-2
                       max-md:text-xs
                       {{ $errors->has('nom') ? 'border-red-500 focus:border-red-500 focus:ring-red-500/30' : 'border-[#3A3F45] focus:border-indigo-500 focus:ring-indigo-500/30' }}">

                    @if ($errors->has('nom'))
                        <p class="mt-1.5 text-xs text-red-400 max-md:text-[11px]">
                            {{ $errors->first('nom') }}
                        </p>
                    @endif
                </div>


                {{-- Type d'activité --}}
                <div>
                    <label for="type" class="block text-sm font-medium text-[#F8FAFC] max-md:text-xs">
                        Type d'activité
                    </label>

                    <select id="type" name="type" required
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

                        @foreach($typeActivities as $type)
                            <option value="{{ $type->id }}" {{ old('type') == $type->Libelle ? 'selected' : '' }}>
                                {{ $type->Libelle }}
                            </option>
                        @endforeach
                    </select>

                    @if ($errors->has('type'))
                        <p class="mt-1.5 text-xs text-red-400 max-md:text-[11px]">
                            {{ $errors->first('type') }}
                        </p>
                    @endif
                </div>


                {{-- Entraîneur --}}
                <div>
                    <label for="entraineur" class="block text-sm font-medium text-[#F8FAFC] max-md:text-xs">
                        Entraîneur
                    </label>

                    <select id="entraineur" name="entraineur" required
                        class="mt-2 block w-full rounded-lg border
                       bg-[#1B1E21]
                       px-3 py-2.5
                       text-sm text-[#F8FAFC]
                       focus:outline-none focus:ring-2
                       transition-all duration-200
                       max-md:px-2.5
                       max-md:py-2
                       max-md:text-xs
                       {{ $errors->has('entraineur') ? 'border-red-500 focus:border-red-500 focus:ring-red-500/30' : 'border-[#3A3F45] focus:border-indigo-500 focus:ring-indigo-500/30' }}">
                        <option value="">-- Sélectionner un entraîneur --</option>

                        @foreach($entraineurs as $entraineur)
                            <option value="{{ $entraineur->personne->id }}" {{ old('entraineur') == $entraineur->personne->Nom ? 'selected' : '' }}>
                                {{ $entraineur->personne->Nom }}
                            </option>
                        @endforeach
                    </select>

                    @if ($errors->has('entraineur'))
                        <p class="mt-1.5 text-xs text-red-400 max-md:text-[11px]">
                            {{ $errors->first('entraineur') }}
                        </p>
                    @endif
                </div>

                {{-- Planning --}}
                <div>
                    <label for="planning" class="block text-sm font-medium text-[#F8FAFC] max-md:text-xs">
                        Planning
                    </label>

                    <select name="planning[]" id="planning" multiple
                        class="mt-2 block w-full rounded-lg border
                       bg-[#1B1E21]
                       px-3 py-2.5
                       text-sm text-[#F8FAFC]
                       focus:outline-none focus:ring-2
                       transition-all duration-200
                       max-md:px-2.5
                       max-md:py-2
                       max-md:text-xs
                       {{ $errors->has('planning') ? 'border-red-500 focus:border-red-500 focus:ring-red-500/30' : 'border-[#3A3F45] focus:border-indigo-500 focus:ring-indigo-500/30' }}">
                        @foreach($plannings as $planning)
                            <option value="{{ $planning->id }}">
                                {{ ucfirst($planning->jour_semain) }}
                                — {{ \Carbon\Carbon::parse($planning->heure_debut)->format('H:i') }}
                                à {{ \Carbon\Carbon::parse($planning->heure_fin)->format('H:i') }}
                            </option>
                        @endforeach
                    </select>

                    @if ($errors->has('planning'))
                        <p class="mt-1.5 text-xs text-red-400 max-md:text-[11px]">
                            {{ $errors->first('planning') }}
                        </p>
                    @endif

                    <p class="mt-1 text-xs text-gray-500">
                        Maintenez Ctrl pour sélectionner plusieurs plannings.
                    </p>
                </div>

            </div>


            {{-- Bouton --}}
            <div class="mt-6 flex justify-end">
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
                    Ajouter l'activité
                </button>
            </div>

        </form>


        <div class="mt-10
                    max-lg:mt-8
                    max-md:mt-7
                    max-sm:mt-6">

            <div class="mb-4">

                <h3 class="text-lg font-semibold text-[#F8FAFC]
                           max-md:text-base
                           max-sm:text-sm">
                    Liste des activites
                </h3>

                <p class="mt-1 text-sm text-[#71717A]
                          max-md:text-xs">
                    Les activites enregistrés apparaîtront ici.
                </p>

            </div>



            <div class="w-full overflow-x-auto rounded-2xl border border-[#34383D] bg-[#1B1E21]/50 max-md:rounded-xl">

                <table class="w-full min-w-225 text-left border-collapse">

                    <thead class="border-b border-[#34383D] bg-[#212427]">
                        <tr>

                            <th class="px-6 py-4 text-sm font-semibold text-[#F8FAFC] whitespace-nowrap
                           max-lg:px-4 max-lg:py-3 max-md:text-xs">
                                Activité
                            </th>

                            <th class="px-6 py-4 text-sm font-semibold text-[#F8FAFC] whitespace-nowrap
                           max-lg:px-4 max-lg:py-3 max-md:text-xs">
                                Type
                            </th>

                            <th class="px-6 py-4 text-sm font-semibold text-[#F8FAFC] whitespace-nowrap
                           max-lg:px-4 max-lg:py-3 max-md:text-xs">
                                Planning
                            </th>

                            <th class="px-6 py-4 text-sm font-semibold text-[#F8FAFC] whitespace-nowrap
                           max-lg:px-4 max-lg:py-3 max-md:text-xs">
                                Entraîneur
                            </th>

                            <th class="px-6 py-4 text-sm font-semibold text-[#F8FAFC] whitespace-nowrap
                           max-lg:px-4 max-lg:py-3 max-md:text-xs">
                                Administrateur
                            </th>

                            <th class="w-30 px-6 py-4 text-sm font-semibold text-[#F8FAFC] whitespace-nowrap
                           max-lg:px-4 max-lg:py-3 max-md:text-xs">
                                Actions
                            </th>

                        </tr>
                    </thead>


                    <tbody class="divide-y divide-[#34383D]">

                        @foreach ($activites as $activite)

                            <tr class="transition-colors duration-200 hover:bg-[#24282C]">

                                {{-- Activité --}}
                                <td
                                    class="px-6 py-4 text-sm text-[#F8FAFC] whitespace-nowrap max-lg:px-4 max-lg:py-3 max-md:text-xs">
                                    {{ $activite->Libelle }}
                                </td>


                                {{-- Type --}}
                                <td
                                    class="px-6 py-4 text-sm text-[#F8FAFC] whitespace-nowrap   max-lg:px-4 max-lg:py-3 max-md:text-xs">
                                    {{ $activite->type_activite->Libelle ?? '—' }}
                                </td>


                                {{-- Planning --}}
                                <td class="px-6 py-4 text-sm text-[#F8FAFC]  max-lg:px-4 max-lg:py-3 max-md:text-xs">

                                    @forelse ($activite->planning as $planning)

                                        <div class="mb-1 whitespace-nowrap">

                                            <span class="font-bold text-[#3B82F6]">
                                                {{ $planning->jour_semain }}
                                            </span>

                                            <span class="ml-1">
                                                {{ $planning->heure_debut }}
                                                -
                                                {{ $planning->heure_fin }}
                                            </span>

                                        </div>

                                    @empty

                                        <span class="text-[#64748B]">
                                            Aucun planning
                                        </span>

                                    @endforelse

                                </td>


                                {{-- Entraîneur --}}
                                <td
                                    class="px-6 py-4 text-sm font-medium text-[#3B82F6]   whitespace-nowrap max-lg:px-4 max-lg:py-3 max-md:text-xs">

                                    @if ($activite->entraineur)

                                        {{ $activite->entraineur->personne->Nom }}

                                    @else

                                        <span class="text-[#64748B]">
                                            Aucun entraîneur
                                        </span>

                                    @endif

                                </td>


                                {{-- Administrateur --}}
                                <td
                                    class="px-6 py-4 text-sm font-medium text-[#3B82F6]  whitespace-nowrap max-lg:px-4 max-lg:py-3 max-md:text-xs">

                                    @if ($activite->admin)

                                        {{ $activite->admin->personne->Prenom }}

                                    @else

                                        <span class="text-[#64748B]">
                                            Aucun admin
                                        </span>

                                    @endif

                                </td>


                                {{-- Actions --}}
                                <td class="w-30 px-4 py-4">

                                    <div class="flex items-center justify-center gap-1">

                                        {{-- Edit --}}
                                        <button type="button" data-id="{{ $activite->id }}"
                                            class="edit-activite rounded-lg p-2   transition-all duration-200hover:bg-[#34383D] active:scale-95 cursor-pointer">

                                            <img class="h-5 w-5" src="{{ asset('icons/edit.svg') }}" alt="Modifier">

                                        </button>


                                        {{-- Delete --}}
                                        <form method="POST" action="" onsubmit="return confirm('Are you sure ?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                class="rounded-lg p-2  transition-all duration-200 hover:bg-[#34383D]  active:scale-95 cursor-pointer">

                                                <img class="h-5 w-5" src="{{ asset('icons/delete.svg') }}" alt="Supprimer">

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>
            </div>

            {{-- Pagination --}}
            <div class="mt-4 flex justify-center">
                {{ $activites->links() }}
            </div>

            <div id="activiteModal" class="hidden fixed inset-0 z-50 w-full h-full items-center justify-center
           bg-slate-950/60 backdrop-blur-md px-4">

                <div class="w-full max-w-2xl rounded-2xl bg-white shadow-2xl">

                    {{-- Header --}}
                    <div class="flex items-center justify-between border-b border-gray-200
                    bg-linear-to-r from-indigo-600 to-indigo-500 px-6 py-5">

                        <div>
                            <h2 id="activiteTitle" class="text-xl font-bold text-white">
                                Modifier l'activité
                            </h2>

                            <p class="mt-1 text-sm text-indigo-100">
                                Modifier les informations de l'activité
                            </p>
                        </div>

                        <button type="button" id="closeActiviteModal" class="flex h-9 w-9 items-center justify-center rounded-full
                       text-xl text-white cursor-pointer hover:bg-white/10">
                            &times;
                        </button>

                    </div>


                    {{-- Form --}}
                    <form method="POST" id="activiteForm" class="p-6">

                        @csrf
                        @method('PUT')

                        <input type="hidden" id="activiteId" name="activite_id">

                        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">

                            {{-- Nom --}}
                            <div>

                                <label for="libelle" class="mb-2 block text-sm font-semibold text-slate-700">
                                    Nom
                                </label>

                                <input type="text" id="libelleAct" name="libelleAct" required class="w-full rounded-xl border border-slate-300
                               bg-slate-50 px-4 py-3 text-slate-800
                               outline-none transition
                               placeholder:text-slate-400
                               focus:border-indigo-500 focus:bg-white
                               focus:ring-2 focus:ring-indigo-500/20">

                            </div>


                            {{-- Type activité --}}
                            <div>

                                <label for="type" class="block text-sm font-medium text-slate-700">
                                    Type d'activité
                                </label>

                                <select id="type" name="type" required class="mt-2 block w-full rounded-lg border
                               bg-[#1B1E21] px-3 py-2.5
                               text-sm text-[#F8FAFC]
                               focus:outline-none focus:ring-2
                               transition-all duration-200
                               border-[#3A3F45]
                               focus:border-indigo-500
                               focus:ring-indigo-500/30">

                                    <option value="">
                                        -- Sélectionner un type --
                                    </option>

                                    @foreach($typeActivities as $type)

                                        <option value="{{ $type->id }}" {{ old('type') == $type->id ? 'selected' : '' }}>
                                            {{ $type->Libelle }}
                                        </option>

                                    @endforeach

                                </select>

                            </div>


                            {{-- Entraîneur --}}
                            <div>

                                <label for="entraineur" class="block text-sm font-medium text-slate-700">
                                    Entraîneur
                                </label>

                                <select id="entraineur" name="entraineur" required class="mt-2 block w-full rounded-lg border
                               bg-[#1B1E21] px-3 py-2.5
                               text-sm text-[#F8FAFC]
                               focus:outline-none focus:ring-2
                               transition-all duration-200
                               border-[#3A3F45]
                               focus:border-indigo-500
                               focus:ring-indigo-500/30">

                                    <option value="">
                                        -- Sélectionner un entraîneur --
                                    </option>

                                    @foreach($entraineurs as $entraineur)

                                        <option value="{{ $entraineur->id }}">
                                            {{ $entraineur->personne->Nom }}
                                            {{ $entraineur->personne->Prenom }}
                                        </option>

                                    @endforeach

                                </select>

                            </div>


                            {{-- Planning --}}
                            <div>

                                <label for="planning" class="block text-sm font-medium text-slate-700">
                                    Planning
                                </label>

                                <select name="planning[]" id="planning" multiple required class="mt-2 block w-full rounded-lg border
                               bg-[#1B1E21] px-3 py-2.5
                               text-sm text-[#F8FAFC]
                               focus:outline-none focus:ring-2
                               transition-all duration-200
                               border-[#3A3F45]
                               focus:border-indigo-500
                               focus:ring-indigo-500/30">

                                    @foreach($plannings as $planning)

                                        <option value="{{ $planning->id }}">

                                            {{ ucfirst($planning->jour_semain) }}
                                            —
                                            {{ \Carbon\Carbon::parse($planning->heure_debut)->format('H:i') }}
                                            à
                                            {{ \Carbon\Carbon::parse($planning->heure_fin)->format('H:i') }}

                                        </option>

                                    @endforeach

                                </select>

                                <p class="mt-1 text-xs text-slate-500">
                                    Maintenez Ctrl pour sélectionner plusieurs plannings.
                                </p>

                            </div>

                        </div>

                        <!-- Buttons -->
                        <div class="mt-7 flex justify-end gap-3 border-t border-gray-200 pt-5">

                            <button type="button"
                                class="rounded-xl border border-slate-300 bg-white  px-5 py-2.5 text-sm font-semibold text-slate-700  transition hover:bg-slate-100">
                                <a href="/admin/activities">
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
    </div>

</x-admin.admin-dashboard-layout>