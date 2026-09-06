<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> {{ $title ?? "Dashboard" }}</title>

    <link rel="icon" type="image/png" href="{{ asset('icons/top-sport.png') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <div class="flex min-h-screen bg-[#121212] ">

        {{-- Sidebar --}}
        <aside class="w-60 shrink-0 fixed left-0 top-0 z-50
               min-h-screen h-full
               flex flex-col items-center 
               gap-5
               border border-[#212427]
               rounded-md
               bg-[#212427]
               
               max-xl:w-52
               max-lg:w-20
               max-md:w-16
               max-sm:w-14">


            {{-- Navigation --}}
            <div class="flex flex-col gap-10 h-full w-full 
                   max-lg:gap-3
                   max-md:gap-2">

                {{-- Sidebar Header --}}
                <div class="flex items-center gap-3 py-4 mx-7 w-full
                       max-lg:justify-center
                       max-lg:mx-0
                       max-lg:gap-0
                       max-md:py-3">

                    {{-- Logo --}}
                    <div class="max-lg:hidden">

                        <h1 class="text-2xl font-extrabold tracking-tight whitespace-nowrap">

                            <span class="text-[#F8FAFC]">
                                Top
                            </span>

                            <span class="text-[#3B82F6]">
                                Sport
                            </span>

                        </h1>

                    </div>

                    <div class="hidden max-lg:flex items-center justify-center
                        max-md:w-10 max-md:h-10
                        max-sm:w-8 max-sm:h-8">

                        <img src="{{ asset('icons/top-sport.png') }}"
                            class="w-12 h-12 max-md:w-10 max-md:h-10 max-sm:w-8 max-sm:h-8 object-contain"
                            alt="Top Sport">

                    </div>

                </div>


                {{-- Dashboard --}}
                <x-admin.admin-dashboard-links-layout href="dashboard" icon="dashboard.svg"
                    :activite="request()->is('responsable/dashboard')">

                    Dashboard

                </x-admin.admin-dashboard-links-layout>


                {{-- Adherents --}}
                <x-admin.admin-dashboard-links-layout href="listeAdherents" icon="person.svg"
                    :activite="request()->is('responsable/listeAdherents')">

                    Listes Adherents

                </x-admin.admin-dashboard-links-layout>

                {{-- Adherents --}}
                <x-admin.admin-dashboard-links-layout href="adherents" icon="person.svg"
                    :activite="request()->is('responsable/adherents')">

                     Adherents

                </x-admin.admin-dashboard-links-layout>
            </div>


            {{-- Logout --}}
            <div class="w-full flex justify-center">

                <form method="POST" action="/logout">

                    @csrf

                    <button type="submit" class="w-30 mb-4
                           px-3 py-2
                           rounded-lg
                           bg-red-600
                           hover:bg-red-500
                           text-[#F8FAFC]
                           font-medium
                           cursor-pointer
                           flex items-center justify-center gap-3

                           max-lg:w-12
                           max-lg:h-12
                           max-lg:p-0
                           max-lg:gap-0

                           max-md:w-10
                           max-md:h-10

                           max-sm:w-9
                           max-sm:h-9">


                        <img class="h-6 w-6
                               max-md:h-5
                               max-md:w-5" src="{{ asset('icons/logout.svg') }}" alt="Log out">


                        <span class="text-sm font-md

                               max-lg:hidden">

                            Log out

                        </span>

                    </button>

                </form>

            </div>

        </aside>


        {{-- Main Content --}}
        <main id="content" class="flex-1
               ml-60
               min-w-0
               min-h-screen
               bg-[#121212]
               p-6

               max-xl:ml-52
               max-xl:p-5

               max-lg:ml-20
               max-lg:p-4

               max-md:ml-16
               max-md:p-3

               max-sm:ml-14
               max-sm:p-2">

            {{ $slot }}

        </main>
    </div>


</body>

</html>