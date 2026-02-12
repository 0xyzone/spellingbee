<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

    <title>SBN {{ now()->year }}</title>
    <meta name="title" content="SB {{ now()->year }}">
    <meta name="description" content="Official platform for SB {{ now()->year }}. Join the legacy of the National Spelling Bee and secure your registration today.">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">

    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="SBN {{ now()->year }}">
    <meta property="og:description" content="Secure your spot for SBN  {{ now()->year }}.">
    <meta property="og:image" content="{{ asset('images/sbn2024.png') }}?v={{ time() }}">
    <meta property="og:image:secure_url" content="{{ asset('images/sbn26.png', true) }}">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="2000">
    <meta property="og:image:height" content="2000">

    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="SBN {{ now()->year }}">
    <meta property="twitter:description" content="Secure your spot for SBN {{ now()->year }}.">
    <meta property="twitter:image" content="{{ asset('images/sbn26.png') }}">

    <meta name="theme-color" content="#f59e0b">

    <link rel="manifest" href="{{ url(route('manifest')) }}">


    <style>
        [x-cloak] {
            display: none !important;
        }

        /* Smooth backdrop for the payment modal */
        .modal-backdrop {
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(8px);
        }

    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/style.css'])
</head>

<body class="min-h-screen bg-slate-50 font-sans text-slate-900 antialiased">

    <x-main-nav></x-main-nav>

    <main>
        {{ $slot }}
    </main>

    <x-footer></x-footer>

    <div x-data="{ open: false }" @open-payment.window="open = true" x-show="open" x-cloak class="fixed inset-0 z-[9999] flex items-center justify-center p-4">

        <div class="modal-backdrop absolute inset-0" @click="open = false"></div>

        <div x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" class="relative bg-white rounded-3xl p-8 max-w-sm w-full shadow-2xl text-center border border-slate-100">

            <h2 class="text-xl font-black text-slate-800 mb-2">Registration Payment</h2>
            <p class="text-slate-500 text-sm mb-6">Evention Master Private Limited</p>

            <div class="bg-slate-50 p-4 rounded-2xl mb-6 inline-block border border-slate-200">
                <img src="{{ asset('images/evention-qr.jpeg') }}" alt="QR Code" class="w-48 h-48 object-contain" />
            </div>

            <div class="space-y-1 mb-8">
                <p class="text-xs font-mono text-slate-400">ID: 2222080000600114</p>
                <p class="text-xs font-semibold text-slate-600 uppercase tracking-tighter">Kathmandu, Nepal</p>
            </div>

            <button @click="open = false" class="w-full py-4 bg-slate-900 text-white rounded-xl font-bold hover:bg-slate-800 transition-all">
                Close Window
            </button>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        // AOS Init
        window.onload = () => {
            AOS.init({
                mirror: true
            });
        };

        // Helper to trigger the Alpine Modal from anywhere
        function openPayment() {
            window.dispatchEvent(new CustomEvent('open-payment'));
        }

        // Apply to your existing buttons
        document.querySelectorAll('.payment-button, #payment-button-mb').forEach(btn => {
            btn.addEventListener('click', openPayment);
        });

    </script>
</body>
</html>
