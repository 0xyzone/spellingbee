<!DOCTYPE html>
<html lang="en" class="dark scroll-smooth scroll-mt-2">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <title>Home</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="w-screen h-full bg-neutral-800 overflow-x-hidden">
    {{-- Top Bar --}}
    {{-- <nav class="sticky w-full h-24 bg-neutral-900 text-white">
        <div class="max-w-6xl mx-auto flex items-center h-full justify-between">
            <div class="flex gap-4 justify-center lg:justify-start w-full lg:w-max">
                <img src="{{ asset('img/Evention_LOGO.png') }}" alt="Spelling bee logo" class="w-20 object-scale-down">
    <img src="{{ asset('img/SpellingBeeLogo_png.png') }}" alt="Spelling bee logo" class="w-[4rem] object-scale-down">
    </div>

    <ul class="lg:flex gap-4 nav-items hidden">
        <a href="https://evention.top" target="_blank">
            <li>Evention Master</li>
        </a>
        <a href="#">
            <li>Spelling Bee Nepal</li>
        </a>
        <a href="#">
            <li>Rules and Regulation</li>
        </a>
        <a href="#">
            <li>Upcoming Events</li>
        </a>
        <a href="#">
            <li>Payment</li>
        </a>
    </ul>
    </div>
    </nav> --}}


    <nav class="border-gray-200 bg-gray-50 dark:bg-gray-800 dark:border-gray-700 sticky top-0 z-[999]">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('img/Evention_LOGO.png') }}" class="h-16" alt="Flowbite Logo" />
                <img src="{{ asset('img/SpellingBeeLogo_png.png') }}" class="h-16" alt="Flowbite Logo" />
            </a>
            <button data-collapse-toggle="navbar-solid-bg" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-solid-bg" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-solid-bg">
                <ul class="flex flex-col font-medium mt-4 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-transparent dark:border-gray-700">
                    <li>
                        <a href="#about" class="block py-2 px-3 md:p-0 text-white bg-honey rounded md:bg-transparent md:text-honey md:dark:text-honey dark:bg-honey md:dark:bg-transparent" aria-current="page">About Event</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-honey dark:text-white md:dark:hover:text-honey dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Services</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-honey dark:text-white md:dark:hover:text-honey dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Pricing</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-honey dark:text-white md:dark:hover:text-honey dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- End Top Bar --}}

    <section class="bg-neutral-500 w-full py-10">
        <div class="flex flex-col gap-4 items-center">
            <img src="{{ asset('img/spellingBee.png') }}" alt="" class="w-11/12 lg:w-full">
            <a href="{{ route('register') }}" class="primary-button text-2xl font-bold animate-bounce">Register Now!</a>
        </div>
        <div class="flex flex-col gap-4 pt-6">
            <h2 class="text-center text-4xl font-bold text-white">Entry Fee</h2>
            <hr>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                <div class="bg-gray-200 flex flex-col rounded-lg p-4 items-center mx-5 lg:mx-0">
                    <p class="font-bold text-2xl">1st Slab</p>
                    <p class="font-bold text-6xl flex pb-3"><span class="text-2xl self-start">Rs.</span><span>300</span><span class="text-2xl self-end">.00</span></p>
                    <p class="w-full text-center py-2 rounded-lg bg-neutral-900 text-white">Till 31 Oct. 2024</p>
                </div>

                <div class="bg-neutral-800 flex flex-col rounded-lg p-4 items-center mx-5 lg:mx-0 text-white">
                    <p class="font-bold text-2xl">2nd Slab</p>
                    <p class="font-bold text-6xl flex pb-3"><span class="text-2xl self-start">Rs.</span><span>500</span><span class="text-2xl self-end">.00</span></p>
                    <p class="w-full text-center py-2 rounded-lg bg-neutral-200 text-neutral-800">Till 15 Nov. 2024</p>
                </div>

                <div class="bg-gray-200 flex flex-col rounded-lg p-4 items-center mx-5 lg:mx-0">
                    <p class="font-bold text-2xl">3rd Slab</p>
                    <p class="font-bold text-6xl flex pb-3"><span class="text-2xl self-start">Rs.</span><span>1000</span><span class="text-2xl self-end">.00</span></p>
                    <p class="w-full text-center py-2 rounded-lg bg-neutral-900 text-white">Till 5 Dec. 2024</p>
                </div>
            </div>
        </div>
    </section>
    @stack('scripts')
</body>
</html>
