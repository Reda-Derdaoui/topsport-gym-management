<x-simple-layout :title="$pageTitle">
    <div class="flex  flex-col items-center justify-center px-6 py-10 lg:px-8">
        <div class="">
            <img src="{{ asset('icons/top-sport.png') }}" alt="Top Sport" class="mx-auto h-20 w-auto" />
            <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-[#F8FAFC] max-sm:text-md">
                Connectez-vous à
                votre compte
            </h2>
        </div>

        <div class="mt-10 h">
            <form action="/login" method="POST"
                class="flex flex-col items-center justify-center space-y-6 border border-[#F8FAFC]  rounded-2xl p-8 bg-[#212427]  shadow-[#F8FAFC] ">
                @csrf

                <div>
                    <label for="email" class="block text-sm/6 font-medium text-[#F8FAFC] ">Email</label>
                    <div class="mt-2">
                        <input id="email" type="email" name="email" required autocomplete="email"
                            class="block w-full rounded-md bg-[#212427] px-3 py-1.5 text-base text-[#F8FAFC] outline-1 -outline-offset-1 outline-[#F8FAFC] placeholder:text-gray-800 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 " />
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm/6 font-medium text-[#F8FAFC]">Password</label>
                    <div class="mt-2">
                        <input id="password" type="password" name="password" required autocomplete="current-password"
                            class="block w-full rounded-md bg-[#212427] px-3 py-1.5 text-base text-[#F8FAFC] outline-1 -outline-offset-1 outline-[#F8FAFC] placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 " />
                    </div>
                </div>

                <div>
                    <div class="flex flex-col gap-5 items-center justify-center">
                        <button type="submit"
                            class=" cursor-pointer justify-center rounded-md bg-indigo-500 px-3 py-1.5 text-sm/6 font-semibold text-white hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                            Se connecter
                        </button>
                    </div>
                </div>

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <h1 class="text-red-400 text-sm">{{ $error }}</h1>
                    @endforeach
                @endif
            </form>
        </div>
    </div>


</x-simple-layout>