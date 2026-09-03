<x-simple-layout>
    <div class="flex flex-col justify-center  px-5 py-10  items-center h-screen">
        <div class="flex flex-col gap-5 items-center">
            <img src="{{ asset('build/assets/icons/top-sport.png') }}" alt="Top Sport" class="mx-auto h-15 w-auto" />
            <h2 class=" text-center text-2xl font-bold tracking-tight text-[#F8FAFC]">Créez votre compte</h2>
        </div>

        <div class="mt-5">
            <form action="/signup" method="POST"
                class="space-y-6 border border-indigo-400 rounded-2xl p-8 bg-[#212427]  shadow-[#F8FAFC]w-100 max-lg:w-90 max-md:w-85 max-sm:w-70">
                @csrf

                <div class="flex gap-10 justify-center items-center max-md:flex-col max-md:gap-2 ">
                    <div>
                        <label for="nom" class="block text-sm font-medium text-[#F8FAFC]">Nom</label>
                        <div class="mt-2">
                            <input id="nom" type="text" name="nom" required autocomplete="nom" value="{{ old('nom') }}"
                                class="{{ $errors->has('nom') ? "outline-red-500" : "outline-[#F8FAFC]" }} bg-[#212427] block w-full rounded-md  px-3 py-1.5 text-base text-[#F8FAFC] outline-1 -outline-offset-1 placeholder:text-[#F8FAFC]focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" />
                        </div>
                        @if ($errors->has('nom'))
                            <h1 class="text-red-400 text-sm ">{{ $errors->first('nom') }}</h1>
                        @endif
                    </div>

                    <div>
                        <label for="prenom" class="block text-sm font-medium text-[#F8FAFC]">Prenom</label>
                        <div class="mt-2">
                            <input id="prenom" type="text" name="prenom" required autocomplete="prenom"
                                value="{{ old('prenom') }}"
                                class="{{ $errors->has('prenom') ? "outline-red-500" : "outline-[#F8FAFC]" }} bg-[#212427] block w-full rounded-md  px-3 py-1.5 text-base text-[#F8FAFC] outline-1 -outline-offset-1 placeholder:text-[#F8FAFC] focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" />
                        </div>
                        @if ($errors->has('prenom'))
                            <h1 class="text-red-400 text-sm ">{{ $errors->first('prenom') }}</h1>
                        @endif
                    </div>
                </div>

                <div class="flex gap-10 justify-center items-center max-md:flex-col max-md:gap-2 ">
                    <div>
                        <label for="tele" class="block text-sm font-medium text-[#F8FAFC]">Telephone</label>
                        <div class="mt-2">
                            <input id="tele" type="text" name="tele" required autocomplete="tele"
                                value="{{ old('tele') }}"
                                class="{{ $errors->has('tele') ? "outline-red-500" : "outline-[#F8FAFC]" }} bg-[#212427] block w-full rounded-md  px-3 py-1.5 text-base text-[#F8FAFC] outline-1 -outline-offset-1 placeholder:text-[#F8FAFC]focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" />
                        </div>
                        @if ($errors->has('tele'))
                            <h1 class="text-red-400 text-sm ">{{ $errors->first('tele') }}</h1>
                        @endif
                    </div>

                    <div>
                        <label for="date" class="block text-sm font-medium text-[#F8FAFC] ">Date naissance</label>
                        <div class="mt-2">
                            <input id="date" type="date" name="date" required autocomplete="date"
                                value="{{ old('date') }}"
                                class="{{ $errors->has('date') ? "outline-red-500" : "outline-[#F8FAFC]" }} bg-[#212427] block w-full rounded-md  px-3 py-1.5 text-base text-[#F8FAFC] outline-1 -outline-offset-1 placeholder:text-[#F8FAFC] focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6 max-md:w-50 " />
                        </div>
                        @if ($errors->has('date'))
                            <h1 class="text-red-400 text-sm ">{{ $errors->first('date') }}</h1>
                        @endif
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-[#F8FAFC]">Email</label>
                    <div class="mt-2">
                        <input id="email" type="email" name="email" required autocomplete="email"
                            value="{{ old('email') }}"
                            class=" {{ $errors->has('email') ? "outline-red-500" : "outline-[#F8FAFC]" }} bg-[#212427] block w-full rounded-md  px-3 py-1.5 text-base text-[#F8FAFC] outline-1 -outline-offset-1 placeholder:text-[#F8FAFC] focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" />
                    </div>
                    @if ($errors->has('email'))
                        <h1 class="text-red-400 text-sm ">{{ $errors->first('email') }}</h1>
                    @endif
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-[#F8FAFC]">Mot de passe</label>
                    <div class="mt-2">
                        <input id="password" type="password" name="password" required autocomplete="current-password"
                            class=" {{ $errors->has('password') ? "outline-red-500" : "outline-[#F8FAFC]" }} bg-[#212427] block w-full rounded-md  px-3 py-1.5 text-base text-[#F8FAFC] outline-1 -outline-offset-1  placeholder:text-[#F8FAFC] focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" />
                    </div>
                    @if ($errors->has('password'))
                        <h1 class="text-red-400 text-sm ">{{ $errors->first('password') }}</h1>
                    @endif
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-[#F8FAFC]">Confirmer le
                        mot de passe
                    </label>
                    <div class="mt-2">
                        <input id="password_confirmation" type="password" name="password_confirmation" required
                            autocomplete="current-password" value="{{ old('password_confirmation') }}"
                            class="{{ $errors->has('password') ? "outline-red-500" : "outline-[#F8FAFC]" }} bg-[#212427] block w-full rounded-md  px-3 py-1.5  text-[#F8FAFC] outline-1 -outline-offset-1 placeholder:text-[#F8FAFC] focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" />
                    </div>
                    @if ($errors->has('password'))
                        <h1 class="text-red-400 text-sm ">{{ $errors->first('password') }}</h1>
                    @endif
                </div>

                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-500 px-3 py-1.5 text-sm/6 font-semibold text-white hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500 cursor-pointer">
                        S'inscrire
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-simple-layout>