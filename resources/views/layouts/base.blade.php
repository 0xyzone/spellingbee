<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SpellingBee</title>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <!-- alpine sources  -->
    <script defer src="https://unpkg.com/alpinejs@3.2.3/dist/cdn.min.js"></script>

    <!-- font awesome icon package -->
    <script src="https://kit.fontawesome.com/0a09f83869.js" crossorigin="anonymous"></script>
    <!-- font awesome icon package -->
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/style.css'])
</head>
<body class="h-full w-full flex flex-col min-h-screen bg-neutral-900 relative">
    <x-main-nav></x-main-nav>
    {{ $slot }}
    <x-footer></x-footer>
    <div id="evention-payment" class="hide">
        <div class="z-[9999] fixed h-screen w-screen overflow-hidden inset-0">
            <div class="grid place-items-center h-full w-full">
                <style>
                    .fadeInTop {
                        animation: fadeInTop 0.3s forwards;
                    }

                    @keyframes fadeInTop {
                        0% {
                            transform: translateY(150px);
                            opacity: 0;
                        }

                        100% {
                            transform: translateY(0);
                            opacity: 1;
                        }
                    }

                    .fadeOutBottom {
                        animation: fadeOutBottom 0.3s forwards;
                    }

                    @keyframes fadeOutBottom {
                        0% {
                            transform: translateY(0);
                            opacity: 1;
                        }

                        100% {
                            transform: translateY(150px);
                            opacity: 0;
                        }
                    }

                </style>
                <div id="model" class="flex flex-col items-center gap-3 overflow-visible bg-neutral-900/90 backdrop-blur-lg p-10 lg:p-40 rounded-md shadow-xl shadow-honey/50 fadeInTop">
                    <h1 class="text-white text-2xl">Evention Master Private Limited</h1>
                    <div class="h-52 aspect-square bg-white p-3 rounded-lg">
                        <img src="{{ asset('images/evention-qr.jpeg') }}" alt="Evention Payment QR" class="h-full w-full object-scale-down" />
                    </div>
                    <p class="text-gray-300">Terminal: 2222080000600114</p>
                    <p class="text-gray-300">Address: Kathmandu MP</p>
                    <div class="w-auto h-auto hover:scale-105 ease-in-out transform duration-150">
                        <button id="close-payment" class="bg-neutral-300 text-neutral-900 px-5 py-2 rounded-md">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const paymentButton = document.getElementById("payment-button");
        const paymentButtonMb = document.getElementById("payment-button-mb");
        const paymentElement = document.getElementById("evention-payment");
        const paymentModel = document.getElementById("model");
        const closePaymentButton = document.getElementById("close-payment");

        paymentButton.addEventListener("click", () => {
            paymentElement.classList.remove("hide");
            paymentModel.classList.remove("fadeOutBottom");
            paymentModel.classList.add("fadeInTop");
            document.body.style.overflow = "hidden";
        });
        paymentButtonMb.addEventListener("click", () => {
            paymentElement.classList.remove("hide");
            paymentModel.classList.remove("fadeOutBottom");
            paymentModel.classList.add("fadeInTop");
            document.body.style.overflow = "hidden";
        });
        closePaymentButton.addEventListener("click", () => {
            paymentModel.classList.remove("fadeInTop");
            paymentModel.classList.add("fadeOutBottom");
            
            setTimeout(() => {
                paymentElement.classList.add("hide");
                document.body.style.overflow = "";
                paymentModel.classList.remove("fadeOutBottom");
            }, 300);
        });

    </script>
</body>

<script>
    window.onload = function() {
        AOS.init({
            mirror: true
        });
    };

</script>

</html>
