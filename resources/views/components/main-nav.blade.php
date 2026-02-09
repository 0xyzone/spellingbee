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
        <a href="{{ route('welcome') }}" class="flex items-center group overflow-visible">
            <div class="h-16 lg:h-24 transition-all duration-500 transform group-hover:scale-110 overflow-visible">
                <img src="{{ asset('images/sbn2024.png') }}" alt="SBN Logo" class="h-full w-auto object-contain drop-shadow-2xl" />
            </div>
        </a>

        <div class="hidden lg:flex items-center gap-12">
            <ul class="flex items-center gap-10 list-none">
                @foreach($navLinks as $link)
                <li>
                    <a href="{{ $link['url'] }}" @if($link['external']) target="_blank" @endif class="font-black text-[13px] uppercase tracking-[0.2em] transition-all duration-300 hover:text-amber-500 relative group" :class="atTop ? 'text-slate-900' : 'text-slate-800'">
                        {{ $link['name'] }}
                        <span class="absolute -bottom-2 left-0 w-0 h-1 bg-amber-400 transition-all duration-500 group-hover:w-full rounded-full"></span>
                    </a>
                </li>
                @endforeach
            </ul>

            <button @click="paymentModalOpen = true" class="group relative px-8 py-4 bg-slate-900 text-white rounded-2xl font-black text-[12px] uppercase tracking-[0.2em] transition-all shadow-xl active:scale-95 overflow-hidden">
                <div class="absolute inset-0 bg-amber-500 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
                <span class="relative z-10 group-hover:text-slate-900 transition-colors uppercase">Pay Registration</span>
            </button>
        </div>

        <button @click="mobileMenuOpen = true" class="lg:hidden p-4 text-slate-900 bg-white shadow-2xl rounded-2xl border border-amber-100">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M4 8h16M4 16h16" /></svg>
        </button>
    </div>

    <template x-teleport="body">
        <div x-show="mobileMenuOpen" class="fixed inset-0 z-[1000] lg:hidden" x-cloak>
            <div x-show="mobileMenuOpen" x-transition.opacity @click="mobileMenuOpen = false" class="absolute inset-0 bg-slate-950/60 backdrop-blur-xl"></div>
            <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-500 transform" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in duration-400 transform" x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full" class="absolute left-0 top-0 h-full w-[85%] max-w-xs bg-white shadow-2xl flex flex-col p-10">
                <div class="flex justify-between items-center mb-16">
                    <img src="{{ asset('images/sbn2024.png') }}" class="h-12" alt="Logo">
                    <button @click="mobileMenuOpen = false" class="text-slate-400 p-2"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-width="3" d="M6 18L18 6M6 6l12 12"></path>
                        </svg></button>
                </div>
                <ul class="flex flex-col gap-8 list-none flex-grow">
                    @foreach($navLinks as $link)
                    <li><a href="{{ $link['url'] }}" @click="mobileMenuOpen = false" @if($link['external']) target="_blank" @endif class="text-2xl font-black text-slate-800 hover:text-amber-500 transition-all">{{ $link['name'] }}</a></li>
                    @endforeach
                </ul>
                <button @click="paymentModalOpen = true; mobileMenuOpen = false" class="w-full py-5 bg-slate-900 text-white rounded-2xl font-black text-sm uppercase tracking-widest shadow-xl">Pay Registration</button>
            </div>
        </div>
    </template>

    <template x-teleport="body">
    <div x-show="paymentModalOpen" 
         x-data="{ 
            startY: 0, 
            currentY: 0, 
            isDragging: false,
            // Track the scrollable div
            get scrollContainer() { return this.$refs.modalContent },

            handleTouchStart(e) {
                this.startY = e.touches[0].clientY;
            },

            handleTouchMove(e) {
                const touchY = e.touches[0].clientY;
                const delta = touchY - this.startY;

                // LOGIC: Only allow dragging down IF the container is scrolled to the top
                if (this.scrollContainer.scrollTop <= 0 && delta > 0) {
                    // Prevent the actual scrolling so the whole modal moves instead
                    if (e.cancelable) e.preventDefault();
                    this.isDragging = true;
                    this.currentY = delta;
                } else {
                    this.isDragging = false;
                    this.currentY = 0;
                }
            },

            handleTouchEnd() {
                this.isDragging = false;
                if (this.currentY > 120) {
                    paymentModalOpen = false;
                }
                this.currentY = 0;
            }
         }" 
         class="fixed inset-0 z-[1001] flex items-end lg:items-center justify-center" 
         x-cloak>

        <div x-show="paymentModalOpen" 
             x-transition.opacity.duration.500ms 
             @click="paymentModalOpen = false" 
             class="absolute inset-0 bg-slate-950/90 backdrop-blur-2xl"></div>

        <div x-show="paymentModalOpen" 
             x-transition:enter="transition cubic-bezier(0.34, 1.56, 0.64, 1) duration-600" 
             x-transition:enter-start="opacity-0 translate-y-full lg:scale-90" 
             x-transition:enter-end="opacity-100 translate-y-0 lg:scale-100" 
             x-transition:leave="transition ease-in duration-400" 
             x-transition:leave-start="opacity-100 translate-y-0 lg:scale-100" 
             x-transition:leave-end="opacity-0 translate-y-full lg:scale-95"
             
             {{-- Handle touch events on the whole panel --}}
             @touchstart="handleTouchStart($event)"
             @touchmove="handleTouchMove($event)"
             @touchend="handleTouchEnd()"
             
             :style="`transform: translateY(${currentY}px); transition: ${isDragging ? 'none' : 'transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1)'}`"
             class="relative bg-white w-full max-w-5xl h-[80vh] lg:h-auto lg:max-h-[90vh] rounded-t-[3rem] lg:rounded-[4rem] shadow-[0_-20px_100px_rgba(0,0,0,0.5)] z-10 flex flex-col lg:flex-row overflow-hidden">

            <div class="lg:hidden w-12 h-1.5 bg-slate-200 rounded-full mx-auto my-4 flex-shrink-0"></div>

            <div x-ref="modalContent" class="flex flex-col lg:flex-row w-full overflow-y-auto lg:overflow-visible scroll-smooth">
                
                {{-- Left Side: Instructions --}}
                <div class="w-full lg:w-[55%] p-8 lg:p-14 bg-slate-50/50 border-b lg:border-b-0 lg:border-r border-slate-100 overflow-visible">
                    <div class="flex items-center gap-3 mb-6">
                        <span class="h-2 w-2 rounded-full bg-amber-500 animate-pulse"></span>
                        <span class="text-amber-600 font-black text-[10px] uppercase tracking-[0.4em]">Official Checkout</span>
                    </div>

                    <h3 class="text-5xl lg:text-7xl font-black text-slate-900 tracking-tighter leading-none mb-10 overflow-visible">
                        HIVE <span class="text-amber-500">PORTAL</span>
                    </h3>

                    <div class="space-y-8">
                        @php
                        $steps = [
                            ['no' => '01', 't' => 'Scan & Pay', 'd' => 'Use Fonepay / eSewa to pay 2,000'],
                            ['no' => '02', 't' => 'Add Remarks', 'd' => 'Must include Student Full Name'],
                            ['no' => '03', 't' => 'WhatsApp', 'd' => 'Send screenshot to confirm']
                        ];
                        @endphp
                        @foreach($steps as $step)
                        <div class="flex items-start gap-6">
                            <div class="w-12 h-12 flex-shrink-0 bg-slate-900 text-white rounded-2xl flex items-center justify-center font-black shadow-lg">
                                {{ $step['no'] }}
                            </div>
                            <div class="pt-1">
                                <h4 class="text-slate-900 font-black uppercase text-sm tracking-tight">{{ $step['t'] }}</h4>
                                <p class="text-slate-500 text-xs font-bold leading-tight">{{ $step['d'] }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <a href="https://wa.me/9779705998433" target="_blank" class="mt-12 flex items-center justify-center gap-4 w-full py-6 bg-[#25D366] text-white rounded-3xl font-black uppercase text-xs tracking-widest shadow-xl active:scale-95">
                        Confirm Registration
                    </a>
                </div>

                {{-- Right Side: QR Code --}}
                <div class="w-full lg:w-[45%] p-10 lg:p-14 flex flex-col items-center justify-center bg-white relative overflow-visible">
                    <div class="relative w-full max-w-[280px] mb-8 lg:mb-10 group overflow-visible">
                        <div class="absolute inset-0 bg-amber-100 rounded-[3rem] rotate-3 group-hover:rotate-6 transition-transform opacity-50 overflow-visible"></div>
                        <div class="relative p-6 bg-white border border-slate-100 rounded-[3rem] shadow-xl overflow-visible">
                            <img src="{{ asset('images/evention-qr.jpeg') }}" alt="QR" class="w-full h-auto object-contain mx-auto">
                        </div>
                    </div>

                    <div class="w-full max-w-[280px] bg-slate-900 text-white p-6 rounded-[2.5rem] shadow-2xl text-center">
                        <p class="text-[9px] font-black text-amber-500 uppercase tracking-widest mb-1">Total Entry Fee</p>
                        <p class="text-3xl font-black">NPR 2,000</p>
                        <p class="text-[10px] text-slate-400 font-bold mb-1">Includes Wordbank</p>
                    </div>

                    <p class="mt-6 text-[10px] text-slate-400 font-bold text-center max-w-[250px]">
                        Please mention <span class="text-slate-900">Student Name</span> in the transfer remarks.
                    </p>

                    <button @click="paymentModalOpen = false" class="mt-10 lg:mt-12 text-slate-300 font-black text-[10px] uppercase tracking-widest hover:text-red-500 py-4 px-8 border border-transparent hover:border-red-50 rounded-2xl transition-all">
                        ✕ Close Portal
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
</nav>
