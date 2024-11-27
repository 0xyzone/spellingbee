<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="w-screen h-full bg-neutral-800 overflow-x-hidden">
    {{-- Top Bar --}}
    <nav class="sticky w-full h-24 bg-neutral-900 text-white">
        <div class="max-w-6xl mx-auto flex items-center h-full justify-between">
            {{-- Logo --}}
            <div class="flex gap-4 justify-center lg:justify-start w-full lg:w-max">
                <img src="{{ asset('img/Evention_LOGO.png') }}" alt="Spelling bee logo" class="w-20 object-scale-down">
                <img src="{{ asset('img/SpellingBeeLogo_png.png') }}" alt="Spelling bee logo" class="w-[4rem] object-scale-down">
            </div>
            {{-- End Logo --}}

            {{-- Nav Items --}}
            <ul class="lg:flex gap-4 nav-items hidden">
                <a href="https://evention.top" target="_blank"><li>Evention Master</li></a>
                <a href="#"><li>Spelling Bee Nepal</li></a>
                <a href="#"><li>Rules and Regulation</li></a>
                <a href="#"><li>Upcoming Events</li></a>
                <a href="#"><li>Payment</li></a>
            </ul>
            {{-- End Nav Items --}}
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
</body>
</html>
