<nav id="navbar" class="fixed z-[999] w-full top-0 bg-neutral-900 py-3 px-3 lg:px-10">
    <div class="flex justify-between items-center overflow-visible">
        <a href="{{ route('welcome') }}" class="flex gap-3">
            <div class="h-20 w-20 p-[0.4rem]">
                <img src="{{ asset('images/sbn2024.png') }}" alt="" class="h-full w-full object-scale-down" />
            </div>
            <div class="h-20 w-20 drop-shadow-lg shadow-[#FFD316]">
                <img src="{{ asset('images/Evention_LOGO.png') }}" alt="" class="h-full w-full object-scale-down" />
            </div>
        </a>
        <div class="relative flex items-center gap-5">
            <div class="hidden lg:inline-block gap-2">
                <ul class="text-white list-none text-xl flex flex-col lg:flex-row font-bold gap-10 overflow-visible h-auto">
                    <li class="hover:text-honey transform ease-in-out duration-300">
                        <a href="https://evention.top/spellingbee" target="_blank" class="group flex gap-2 items-center">
                            <span class="group-hover:inline hidden"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                                </svg>
                            </span>
                            Evention Master
                        </a>
                    </li>
                    <li class="hover:text-honey transform ease-in-out duration-300">
                        <a href="{{ route('about') }}">Spelling Bee Nepal</a>
                    </li>
                    <li class="hover:text-honey transform ease-in-out duration-300">
                        <a href="{{ route('rules') }}">Rules and Regulation</a>
                    </li>
                    <li class="hover:text-honey transform ease-in-out duration-300">
                        <a href="{{ route('about') . '#faq' }}">FAQ</a>
                    </li>
                    {{-- <li>
                        <a href="/src/upcoming-events.html">Upcoming Events</a>
                    </li> --}}
                    <li class="hover:text-honey transform ease-in-out duration-300">
                        <button id="payment-button">Payment</button>
                    </li>
                </ul>
            </div>
            <span class="lg:hidden">
                <button id="open-mobile-nav" class="bg-transparent text-white cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </span>
        </div>
    </div>
</nav>

<div class="lg:hidden">
    <div id="mobile-sidebar" class="fixed top-0 z-[9999] overflow-hidden h-screen w-full bg-black bg-opacity-50">
        <div class="flex w-full h-full">
            <div class="h-full w-64 bg-neutral-900/70 backdrop-blur-md text-white px-3 pt-3 pb-5 flex flex-col gap-5 overflow-y-auto">
                <div class="pb-2 flex justify-end items-center border-b border-solid border-x-0 border-t-0 border-b-blue/50">
                    {{-- <a href="{{ route('welcome') }}" class="flex gap-3">
                        <div class="h-20 w-20">
                            <img src="{{ asset('images/Evention_LOGO.png') }}" alt="" class="h-full w-full object-fit" />
                        </div>
                        <div class="h-20 w-20 bg-white rounded-full p-2">
                            <img src="{{ asset('images/spelling-bee-nepal.png') }}" alt="" class="h-full w-full object-fit" />
                        </div>
                    </a> --}}
                    <span id="close-mobile-nav" class="overflow-hidden">
                        <button class="border-none cursor-pointer text-xl text-white">
                            <x-feathericon-x class="w-6 h-6 bg-transparent" />
                        </button>
                    </span>
                </div>
                <div class="flex flex-col gap-5 justify-between">
                    <ul class="list-none text-sm flex flex-col font-semibold lg:flex-row gap-0">
                        <li class="px-2 py-2 hover:bg-gray-200 transform ease-in-out duration-150 w-full">
                            <a href="https://evention.top/spellingbee" target="_blank">Evention Master</a>
                        </li>
                        <li class="px-2 py-2 hover:bg-gray-200 transform ease-in-out duration-150 w-full">
                            <a href="{{ route('about') }}">Spelling Bee Nepal</a>
                        </li>
                        <li class="px-2 py-2 hover:bg-gray-200 transform ease-in-out duration-150 w-full">
                            <a href="{{ route('rules') }}">Rules and Regulation</a>
                        </li><li class="px-2 py-2 hover:bg-gray-200 transform ease-in-out duration-150 w-full">
                            <a href="{{ route('about') . "#faq" }}">FAQ</a>
                        </li>
                        {{-- <li class="px-2 py-2 hover:bg-gray-200 transform ease-in-out duration-150 w-full">
                            <a href="/src/upcoming-events.html">Upcoming Events</a>
                        </li> --}}
                        <li class="px-2 py-2 hover:bg-gray-200 transform ease-in-out duration-150 w-full">
                            <button id="payment-button-mb">Payment</button>
                        </li>
                    </ul>
                </div>
                <div class="flex-grow"></div>
            </div>
            <div id="mobile-sidebar-right" class="flex-grow"></div>
        </div>
    </div>
</div>
<div class="h-24 w-full"></div>
