@props ([
    'icon' => '',
    'activite' => false,
])

<div class="flex items-center mx-5
            sidebar-link
            max-lg:mx-2
            max-md:mx-1">

    {{-- Icon --}}
    <a class="
               flex items-center justify-center
               shrink-0
               rounded-lg

               max-lg:w-14
               max-lg:h-12
               max-md:w-12
               max-md:h-11
               max-sm:w-10
               max-sm:h-10" {{ $attributes }}>

        <img class="h-8 w-8
                   max-md:h-7
                   max-md:w-7
                   max-sm:h-6
                   max-sm:w-6" src="{{ asset('icons/' . $icon) }}" alt="">
    </a>


    {{-- Text --}}
    <a class="
               px-3 py-2
               text-md font-medium
               whitespace-nowrap
               rounded-lg

               max-lg:hidden" {{ $attributes }}>

        {{ $slot }}

    </a>

</div>