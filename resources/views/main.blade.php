<x-base>
    <x-top-content :sponsors=$sponsors :supporters=$supporters></x-top-content>
    
    {{-- ASBC Affiliation Section --}}
    <section class="bg-neutral-900 w-full py-16 text-white mt-12">
        <div class="max-w-6xl mx-auto px-5 lg:px-0 flex flex-col gap-8 items-center text-center">
            <h2 class="text-4xl font-bold">Affiliated with Asian Spelling Bee Cup (ASBC)</h2>
            <div class="flex flex-col lg:flex-row items-center gap-12 bg-neutral-800 p-8 rounded-2xl shadow-xl w-full">
                <div class="w-full lg:w-1/3 flex justify-center">
                    <img src="{{ asset('img/asbc_logo.png') }}" alt="Asian Spelling Bee Cup Logo" class="w-48 h-48 object-contain bg-white rounded-full p-4 shadow-lg">
                </div>
                <div class="w-full lg:w-2/3 flex flex-col gap-4 text-left">
                    <p class="text-lg text-neutral-300">
                        SpellingBee Nepal is proudly affiliated with the <strong>Asian Spelling Bee Cup (ASBC)</strong>. Launched in 2021, ASBC is an international educational program dedicated to strengthening cross-country youth exchanges and fostering cultural communication among Asian countries.
                    </p>
                    <div class="flex flex-col gap-2 mt-2 text-neutral-400">
                        <h3 class="text-xl font-semibold text-white">ASBC's Core Mission:</h3>
                        <ul class="list-disc list-inside space-y-1">
                            <li><strong>Cultural Exchange & Communication:</strong> Creating a platform for cross-cultural interaction and international friendship.</li>
                            <li><strong>Academic & Skill Development:</strong> Intensive training focusing on vocabulary, strategy, and research skills.</li>
                            <li><strong>Holistic Growth:</strong> Building students' confidence, communication abilities, and overall academic excellence through global competition.</li>
                        </ul>
                    </div>
                    <div class="mt-4">
                        <a href="http://www.asianspellingbee.com/" target="_blank" rel="noopener noreferrer" class="inline-block bg-yellow-500 hover:bg-yellow-600 text-neutral-900 font-bold py-3 px-8 rounded-lg shadow-md transition-all duration-300 transform hover:-translate-y-1">
                            Visit Official ASBC Website
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-base>
