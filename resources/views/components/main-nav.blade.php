@php
$navLinks = [
['name' => 'The Legacy', 'url' => '#about-sbn', 'external' => false],
['name' => 'FAQ', 'url' => '#faq', 'external' => false],
['name' => 'Evention Master', 'url' => 'https://evention.top/', 'external' => true],
];
@endphp

<nav x-data="{ 
        mobileMenuOpen: false, 
        paymentModalOpen: false, 
        atTop: true 
    }" x-init="
        $watch('mobileMenuOpen', value => document.body.style.overflow = value ? 'hidden' : '');
        $watch('paymentModalOpen', value => document.body.style.overflow = value ? 'hidden' : '');
    " @scroll.window="atTop = (window.pageYOffset > 50 ? false : true)" @open-payment.window="paymentModalOpen = true" class="fixed z-[999] w-full top-0 transition-all duration-700 px-6 lg:px-12" :class="atTop ? 'bg-transparent py-10' : 'bg-white/95 backdrop-blur-2xl shadow-xl py-5 border-b border-amber-100/50'">

    <div class="max-w-screen-2xl mx-auto flex justify-between items-center overflow-visible">
        <a href="{{ route('welcome') }}" class="flex items-center group">
            <div class="h-16 lg:h-24 transition-all duration-500 transform group-hover:scale-110">
                <img src="{{ asset('images/sbn2024.png') }}" alt="SBN Logo" class="h-full w-auto object-contain" />
            </div>
        </a>

        <div class="hidden lg:flex items-center gap-12 overflow-visible">
            <ul class="flex items-center gap-10 list-none">
                @foreach($navLinks as $link)
                <li>
                    <a href="{{ $link['url'] }}" @if($link['external']) target="_blank" @endif class="font-black text-[11px] uppercase tracking-[0.2em] transition-all duration-300 hover:text-amber-500 relative group" :class="atTop ? 'text-slate-900' : 'text-slate-800'">
                        {{ $link['name'] }}
                        <span class="absolute -bottom-2 left-0 w-0 h-1 bg-amber-400 transition-all duration-500 group-hover:w-full rounded-full"></span>
                    </a>
                </li>
                @endforeach
            </ul>

            <button @click="paymentModalOpen = true" class="group relative px-10 py-4 bg-slate-900 text-white rounded-2xl font-black text-[11px] uppercase tracking-[0.2em] overflow-visible transition-all shadow-xl active:scale-95">
                <div class="absolute inset-0 bg-amber-500 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
                <span class="relative z-10 group-hover:text-slate-900 transition-colors">Pay Registration</span>
            </button>
        </div>

        <button @click="mobileMenuOpen = true" class="lg:hidden p-4 text-slate-900 bg-white shadow-2xl rounded-2xl">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M4 8h16M4 16h16" />
            </svg>
        </button>
    </div>

    <template x-teleport="body">
        <div x-show="mobileMenuOpen" class="fixed inset-0 z-[1000] lg:hidden" x-cloak>
            <div x-show="mobileMenuOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click="mobileMenuOpen = false" class="absolute inset-0 bg-slate-950/60 backdrop-blur-xl"></div>

            <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-500 transform" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in duration-400 transform" x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full" class="absolute left-0 top-0 h-full w-[85%] max-w-xs bg-white shadow-2xl flex flex-col p-10">

                <div class="flex justify-between items-center mb-16">
                    <img src="{{ asset('images/sbn2024.png') }}" class="h-12" alt="Logo">
                    <button @click="mobileMenuOpen = false" class="text-slate-400 p-2"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-width="3" d="M6 18L18 6M6 6l12 12"></path>
                        </svg></button>
                </div>

                <ul class="flex flex-col gap-8 list-none flex-grow">
                    @foreach($navLinks as $link)
                    <li>
                        <a href="{{ $link['url'] }}" @click="mobileMenuOpen = false" @if($link['external']) target="_blank" @endif class="text-2xl font-black text-slate-800 hover:text-amber-500 transition-all italic">
                            {{ $link['name'] }}
                        </a>
                    </li>
                    @endforeach
                </ul>

                <button @click="paymentModalOpen = true; mobileMenuOpen = false" class="w-full py-5 bg-slate-900 text-white rounded-2xl font-black text-xs uppercase tracking-widest shadow-xl">
                    Pay Registration
                </button>
            </div>
        </div>
    </template>

    <template x-teleport="body">
        <div x-show="paymentModalOpen" class="fixed inset-0 z-[1001] flex items-center justify-center p-4 lg:p-10 overflow-visible" x-cloak>
            <div x-show="paymentModalOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click="paymentModalOpen = false" class="absolute inset-0 bg-slate-950/90 backdrop-blur-md"></div>

            <div x-show="paymentModalOpen" x-transition:enter="ease-out duration-500 transform" x-transition:enter-start="opacity-0 translate-y-12 scale-95" x-transition:enter-end="opacity-100 translate-y-0 scale-100" x-transition:leave="ease-in duration-300 transform" x-transition:leave-start="opacity-100 translate-y-0 scale-100" x-transition:leave-end="opacity-0 translate-y-8 scale-95" class="relative bg-white rounded-[3rem] shadow-2xl w-full max-w-4xl overflow-hidden z-10 grid lg:grid-cols-2">

                <div class="bg-slate-50 p-8 lg:p-12 border-r border-slate-100 rounded-l-[3rem] flex flex-col justify-center">
                    <div class="mb-10">
                        <h3 class="text-3xl font-black text-slate-900 uppercase tracking-tighter italic">Hive <span class="text-amber-500">Portal</span></h3>
                        <p class="text-xs text-slate-400 font-bold uppercase tracking-widest mt-2">Follow these 3 steps to register</p>
                    </div>

                    <div class="space-y-8">
                        <div class="flex gap-5 group">
                            <span class="flex-shrink-0 w-10 h-10 rounded-2xl bg-slate-900 text-white flex items-center justify-center font-black text-sm group-hover:bg-amber-500 transition-colors">01</span>
                            <div>
                                <h4 class="text-slate-900 font-black text-sm uppercase mb-1">Scan & Pay</h4>
                                <p class="text-xs text-slate-500 leading-relaxed">Scan the QR code and pay the registration fee of <span class="text-slate-900 font-bold">NPR 1,000</span>.</p>
                            </div>
                        </div>
                        <div class="flex gap-5 group">
                            <span class="flex-shrink-0 w-10 h-10 rounded-2xl bg-slate-900 text-white flex items-center justify-center font-black text-sm group-hover:bg-amber-500 transition-colors">02</span>
                            <div>
                                <h4 class="text-slate-900 font-black text-sm uppercase mb-1">Add Remarks</h4>
                                <p class="text-xs text-slate-500 leading-relaxed italic">Important: Mention the <span class="text-amber-600 font-bold underline underline-offset-2">Student's Full Name</span> in the payment remarks.</p>
                            </div>
                        </div>
                        <div class="flex gap-5 group">
                            <span class="flex-shrink-0 w-10 h-10 rounded-2xl bg-slate-900 text-white flex items-center justify-center font-black text-sm group-hover:bg-amber-500 transition-colors">03</span>
                            <div>
                                <h4 class="text-slate-900 font-black text-sm uppercase mb-1">Confirm Buzz</h4>
                                <p class="text-xs text-slate-500 leading-relaxed">Send your payment screenshot to our WhatsApp to finalize the slot.</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-12">
                        <a href="https://wa.me/9779705998433" target="_blank" class="flex items-center justify-center gap-3 w-full py-5 bg-[#25D366] text-white rounded-2xl font-black text-xs uppercase tracking-widest shadow-xl hover:shadow-[#25D366]/40 hover:-translate-y-1 transition-all">
                            Confirm on WhatsApp
                        </a>
                    </div>
                </div>

                <div class="p-10 lg:p-16 text-center flex flex-col justify-center items-center relative overflow-hidden">
                    <img src="{{ asset('images/honeycomb.png') }}" class="absolute inset-0 opacity-[0.04] pointer-events-none" />

                    <div class="relative group mb-10">
                        <div class="absolute -inset-6 bg-amber-400/20 rounded-[3rem] blur-2xl group-hover:bg-amber-400/40 transition-all duration-500"></div>
                        <div class="relative p-6 bg-white border border-slate-100 rounded-[2.5rem] shadow-sm">
                            <img src="{{ asset('images/evention-qr.jpeg') }}" alt="QR" class="w-52 h-52 lg:w-64 lg:h-64 object-contain mx-auto">
                        </div>
                    </div>

                    <div class="w-full bg-slate-900 text-white rounded-[2rem] p-6 flex flex-col items-center">
                        <span class="text-[10px] font-bold text-amber-500 uppercase tracking-widest mb-1">Total Due</span>
                        <span class="text-3xl font-black tracking-tight overflow-visible">NPR 1,000</span>
                    </div>

                    <button @click="paymentModalOpen = false" class="mt-8 text-slate-400 font-black text-[10px] uppercase tracking-widest hover:text-red-500 transition-colors">
                        Close Portal
                    </button>
                </div>
            </div>
        </div>
    </template>
</nav>

<style>
    [x-cloak] {
        display: none !important;
    }

    /* Prevent nav element from clipping its own shadows */
    nav {
        overflow: visible !important;
    }

</style>
