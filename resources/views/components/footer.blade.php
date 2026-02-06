<footer class="relative overflow-visible">
    <div class="absolute top-0 left-0 w-full h-1.5 bg-gradient-to-r from-amber-400 via-amber-600 to-amber-400 shadow-[0_-5px_20px_rgba(245,158,11,0.3)]"></div>

    <div class="bg-slate-950 text-gray-300 w-full pt-16 pb-8 px-6 sm:px-10 lg:px-24 2xl:px-36 relative overflow-hidden">

        <div class="absolute right-0 top-0 h-full w-1/2 pointer-events-none opacity-20 lg:opacity-30 mix-blend-screen">
            <img src="{{ asset('images/honeycomb.png') }}" alt="" class="h-full w-full object-cover object-right" />
        </div>

        <div class="relative z-10 grid lg:grid-cols-12 gap-12 border-b border-slate-800 pb-12">

            <div class="lg:col-span-5">
                <img src="{{ asset('images/Evention_Master_logo.png') }}" alt="Evention Master" class="h-20 w-auto mb-8">
                <p class="text-slate-400 max-w-sm leading-relaxed font-medium">
                    Leading the hive in academic excellence. Evention Master is dedicated to reviving the prestige of <span class="text-amber-500 font-bold italic">Spelling Bee Nepal</span> for a new generation of wordsmiths.
                </p>
            </div>

            <div class="lg:col-span-7">
                <h2 class="text-amber-500 font-black uppercase tracking-[0.3em] text-xs mb-8 italic">Hive Command Center</h2>

                <div class="grid sm:grid-cols-2 gap-y-8 gap-x-12">
                    <div class="group flex gap-4">
                        <div class="shrink-0 w-12 h-12 bg-slate-900 rounded-2xl flex items-center justify-center border border-slate-800 group-hover:border-amber-500 group-hover:bg-amber-500/10 transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-5 text-amber-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-white font-black text-sm uppercase tracking-tighter mb-1">Base Ops</h4>
                            <p class="text-xs text-slate-500 leading-relaxed font-medium">Phusinghkhya (Manamaiju), Tarakeshwor Municipality</p>
                        </div>
                    </div>

                    <div class="group flex gap-4">
                        <div class="shrink-0 w-12 h-12 bg-slate-900 rounded-2xl flex items-center justify-center border border-slate-800 group-hover:border-amber-500 group-hover:bg-amber-500/10 transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-5 text-amber-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-white font-black text-sm uppercase tracking-tighter mb-1">Signal Channel</h4>
                            <p class="text-xs text-slate-500 leading-relaxed font-medium">contact@spellingbee.asia</p>
                        </div>
                    </div>

                    <div class="group flex gap-4 sm:col-span-2">
                        <div class="shrink-0 w-12 h-12 bg-slate-900 rounded-2xl flex items-center justify-center border border-slate-800 group-hover:border-amber-500 group-hover:bg-amber-500/10 transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-5 text-amber-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-white font-black text-sm uppercase tracking-tighter mb-1">Emergency Buzz</h4>
                            <p class="text-xs text-slate-500 font-bold italic">+977-014026748 <span class="text-amber-700 mx-2">|</span> +977-9705998433</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8 flex flex-col md:flex-row justify-between items-center gap-6 relative z-10">
            <div class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-500">
                © {{ now()->year }} <span class="text-slate-300">Evention Master</span> <span class="mx-2">/</span> Spelling Bee Nepal
            </div>

            <div class="flex items-center gap-6">
                <span class="text-[10px] font-black uppercase tracking-widest text-slate-600">Connect Swarm:</span>
                <div class="flex gap-4">
                    <a href="https://fb.com/spellingbee.asia" target="_blank" class="w-10 h-10 rounded-xl bg-slate-900 border border-slate-800 flex items-center justify-center text-slate-400 hover:text-white hover:bg-amber-600 hover:border-amber-500 hover:-translate-y-1 transition-all duration-300">
                        <x-fab-facebook class="w-5 h-5" />
                    </a>
                    <a href="https://www.instagram.com/spellingbee.asia/" target="_blank" class="w-10 h-10 rounded-xl bg-slate-900 border border-slate-800 flex items-center justify-center text-slate-400 hover:text-white hover:bg-amber-600 hover:border-amber-500 hover:-translate-y-1 transition-all duration-300">
                        <x-fab-instagram-square class="w-5 h-5" />
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
