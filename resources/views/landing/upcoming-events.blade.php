<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SpellingBee</title>
    <link rel="stylesheet" href="/public/css/output.css" />
    <link rel="stylesheet" href="/public/css/style.css" />

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <script src="/public/js/owl.js" defer></script>
    <script src="/public/js/script.js" defer></script>
    <script src="/public/js/alpine.js" defer></script>

        <!-- alpine sources  -->
        <script
        defer
        src="https://unpkg.com/alpinejs@3.2.3/dist/cdn.min.js"
      ></script>

    <!-- font awesome icon package -->
    <script
      src="https://kit.fontawesome.com/0a09f83869.js"
      crossorigin="anonymous"
    ></script>
    <!-- font awesome icon package -->
  </head>
  <body class="h-full w-full flex flex-col min-h-screen">
    <div>
      <nav id="navbar" class="bg-bee-gradient py-3 px-3 lg:px-10">
        <div class="flex justify-between items-center">
          <div class="flex gap-3">
            <div class="h-20 w-20">
              <img
                src="/public/images/Evention_LOGO.png"
                alt=""
                class="h-full w-full object-fit"
              />
            </div>
            <div class="h-20 w-20">
              <img
                src="/public/images/sbn2024.png"
                alt=""
                class="h-full w-full object-fit"
              />
            </div>
          </div>
          <div class="flex items-center gap-5">
            <div class="hidden lg:inline-block gap-2">
              <ul class="list-none text-sm flex flex-col lg:flex-row gap-5">
                <li>
                  <a href="/src/index.html" class="font-jaro">Home</a>
                </li>
                <li>
                  <a href="https://evention.top/spellingbee" target="_blank" class="font-jaro">Evention Master</a>
                </li>
                <li>
                  <a href="/src/spelling-bee-nepal.html" class="font-jaro"
                    >Spelling Bee Nepal</a
                  >
                </li>
                <li>
                  <a href="/src/rules-regulations.html" class="font-jaro"
                    >Rules and Regulation</a
                  >
                </li>
                <li>
                  <a href="/src/upcoming-events.html" class="font-jaro"
                    >Upcoming Events</a
                  >
                </li>
              </ul>
            </div>

            <span class="lg:hidden">
              <button
                id="open-mobile-nav"
                class="bg-transparent text-white cursor-pointer"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  class="size-6"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
                  />
                </svg></button
            ></span>
          </div>
        </div>
      </nav>

      <div class="lg:hidden">
        <div
          id="mobile-sidebar"
          class="fixed top-0 z-[100] overflow-hidden h-screen w-full bg-black bg-opacity-50"
        >
          <div class="flex w-full h-full">
            <div
              class="h-full w-80 bg-white px-3 pt-3 pb-5 flex flex-col gap-5 overflow-y-auto"
            >
              <div
                class="pb-2 flex justify-between items-center border-b border-solid border-x-0 border-t-0 border-b-blue/50"
              >
                <div class="flex gap-3">
                  <div class="h-20 w-20">
                    <img
                      src="/public/images/Evention_LOGO.png"
                      alt=""
                      class="h-full w-full object-fit"
                    />
                  </div>
                  <div class="h-20 w-20">
                    <img
                      src="/public/images/sbn2024.png"
                      alt=""
                      class="h-full w-full object-fit"
                    />
                  </div>
                </div>
                <span id="close-mobile-nav" class="overflow-hidden">
                  <button
                    class="border-none bg-white cursor-pointer text-xl text-red-500"
                  >
                  <i class="fa-solid fa-xmark"></i>
                </button>
                </span>
              </div>
              <div class="flex flex-col gap-5 justify-between">
                <ul class="list-none text-sm flex flex-col lg:flex-row gap-5">
                  <li>
                    <a href="/src/index.html" class="font-jaro">Home</a>
                  </li>
                  <li>
                    <a href="https://evention.top/spellingbee" target="_blank" class="font-jaro">Evention Master</a>
                  </li>
                  <li>
                    <a href="/src/spelling-bee-nepal.html" class="font-jaro">Spelling Bee Nepal</a>
                  </li>
                  <li>
                    <a href="/src/rules-regulations.html" class="font-jaro">Rules and Regulation</a>
                  </li>
                  <li>
                    <a href="/src/upcoming-events.html" class="font-jaro">Upcoming Events</a>
                  </li>
                </ul>
              </div>
              <div class="flex-grow"></div>
            </div>
            <div id="mobile-sidebar-right" class="flex-grow"></div>
          </div>
        </div>
      </div>

    <div class="text-[#0C2626] flex-grow h-full">
      <div class="pt-10 px-5 sm:px-10 lg:px-20 2xl:px-36">
        <h1 class="mb-5 text-2xl font-bold text-[#FFD50D]">
          Upcoming Events
        </h1>
        <div
          class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5"
        >
          <div
            class="rounded-lg border-2 border-amber-200 p-3 hover:shadow-xl transform ease-in-out duration-150"
          >
            <div class="flex flex-col gap-2">
              <div class="h-52 w-full rounded-lg overflow-hidden shrink-0">
                <img
                  src="https://spellingbeeinternational.com/img/about/3.jpg"
                  alt=""
                  class="h-full w-full object-cover"
                />
              </div>
              <div class="flex flex-col gap-2">
                <h1
                  class="text-base italic font-semibold text-yellow-600 pb-2 border border-neutral-100 border-x-0 border-t-0"
                >
                  Bee Brilliant: A Spelling Challenge 2024
                </h1>
                <div
                  class="flex items-center gap-2 pb-2 border border-neutral-100 border-x-0 border-t-0"
                >
                  <div class="flex flex-grow justify-between text-sm gap-1">
                    <div class="flex items-center gap-2">
                      <div
                        class="text-yellow-600 flex flex-col items-center justify-center shrink-0"
                      >
                        <i class="fa-regular fa-calendar"></i>
                      </div>
                      <p>Starts: <span class="font-semibold">17th Oct, 2024</span></p>
                    </div>
                    <div class="flex items-center gap-2">
                      <div
                        class="text-yellow-600 flex flex-col items-center justify-center shrink-0"
                      >
                        <i class="fa-regular fa-calendar"></i>
                      </div>
                      <p>Ends: <span class="font-semibold">30th Oct, 2024</span></p>
                    </div>
                  </div>
                </div>

                <div
                  class="pb-2 border border-neutral-100 border-x-0 border-t-0"
                >
                  <div class="flex items-center gap-2">
                    <div
                      class="text-yellow-600 flex flex-col items-center justify-center shrink-0"
                    >
                      <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <p class="text-sm font-semibold">
                      Prime Commericial building, Khusibun, Kathmandu
                    </p>
                  </div>
                </div>

                <div>
                  <p class="text-xs text-neutral-600 text-justify line-clamp-4">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    Voluptates, aliquam laudantium. Est qui libero ullam unde
                    dolores deleniti voluptatem consequuntur? Lorem ipsum dolor,
                    sit amet consectetur adipisicing elit. Itaque tempore enim
                    dignissimos, sit repellat magnam.
                  </p>
                </div>

                <div class="rounded-lg text-white bg-bee-gradient p-1">
                  <h1 class="text-center font-semibold">Registration Date</h1>
                  <p class="mt-1 text-sm text-center font-semibold">
                    <span>10th Oct,2024</span>&nbsp;-&nbsp;<span
                      >14th Oct,2024</span
                    >
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="relative mt-10 overflow-hidden">
      <div
        class="text-white bg-amber-400 w-full pt-10 pb-5 px-5 sm:px-10 lg:px-20 2xl:px-36"
      >
        <div class="border-2 border-x-0 border-t-0 pb-5">
          <h1 class="text-xl font-extrabold">Connect With Us</h1>
          <div class="mt-5 flex flex-col font-semibold gap-3">
            <div class="flex items-center gap-2">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="size-6"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
                />
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z"
                />
              </svg>

              <h4>Khusinghkhya (Manamaiju) Tarakeshwor Municipality</h4>
            </div>
            <div class="flex items-center gap-2">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="size-6"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"
                />
              </svg>

              <h4>connect@evention.top</h4>
            </div>
            <div class="flex items-center gap-2">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="size-6"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z"
                />
              </svg>
              <h4>+977-014026748, +977-9851333618</h4>
            </div>
          </div>
        </div>
        <div class="mt-2">
          <h1 class="text-sm">© 2024 Evention Master | Spelling Bee 2024</h1>
        </div>
        <div class="hidden lg:inline-block overflow-hidden">
          <div class="absolute top-0 bottom-0 right-0 overflow-hidden">
            <img
              src="/public/images/honeycomb.png"
              alt=""
              class="mix-blend-soft-light"
            />
          </div>
        </div>
      </div>
    </footer>
  </body>
</html>
