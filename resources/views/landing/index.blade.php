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
                class="h-full w-full object-scale-down"
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
                  <a rel="noopener" href="https://evention.top/spellingbee" target="_blank" class="font-jaro">Evention Master</a>
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
              <button title="open-mobile-nav"
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
                  <button title="Twitter"
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
                    <a rel="noopener" href="https://evention.top/spellingbee" target="_blank" class="font-jaro">Evention Master</a>
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

      <div class="border-x-0 border-t-0 border-b border-white w-full h-[45vh] md:h-[65vh] 2xl:h-[75vh] bg-bee-gradient flex flex-col z-20">
        <div
          class="relative flex-grow overflow-hidden pt-10 px-5 sm:px-10 lg:px-20 2xl:px-36"
        >
          <div class="z-50">
            <div class="mt-0 2xl:mt-10 flex flex-col gap-3 max-w-2xl">
              <h1
                class="z-20 text-5xl md:text-6xl xl:text-7xl text-white font-aclonica overflow-hidden"
              >
                SPELLING BEE CHAMPIONSHIP
              </h1>
              <p class="font-semibold text-neutral-800 z-20">
                An exciting competition where participants can showcase their
                spelling skills and vocabulary knowledge encouraging learning,
                sharpening language abilities, and promoting friendly competition
                in a fun and educational environment.
              </p>
              <button class="w-max px-5 py-2 bg-black text-white">
                Register Now
              </button>
            </div>
          </div>
          <div class="absolute right-0 sm:right-5 bottom-10 sm:bottom-0">
            <img
              src="/public/images/honeybee.png"
              alt=""
              class="z-10 h-72 md:h-96 xl:h-[500px] 2xl:h-[550px] mix-blend-multiply select-none"
            />
          </div>
        </div>
      </div>
      <div class="separator"></div>
    </div>

    <div class="pt-10 px-5 sm:px-10 lg:px-20 2xl:px-36">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
        <div data-aos="fade-right" class="flex flex-col gap-2 lg:px-10">
          <div class="flex items-end gap-2">
            <div class="h-40 w-64 bg-neutral-100 rounded-lg"></div>
            <div class="h-52 w-64 bg-neutral-100 rounded-lg"></div>
          </div>
          <div class="flex items-start gap-2">
            <div class="h-52 w-64 bg-neutral-100 rounded-lg"></div>
            <div class="h-40 w-64 bg-neutral-100 rounded-lg"></div>
          </div>
        </div>
        <div
          data-aos="fade-left"
          class="flex flex-col items-center justify-center"
        >
          <div class="flex flex-col gap-2 lg:px-10">
            <h1 class="text-[#FFD50D] font-extrabold text-2xl">
              ABOUT THE BEE
            </h1>
            <p class="text-sm font-medium text-neutral-800">
              The National Spelling Bee is a literacy programme that teaches
              primary children between ages 7 and 13, how to improve their
              spelling, increase their vocabulary, learn and understand word
              concepts and develop English usage which will help them all their
              lives. The National Spelling Bee is affiliated to the Scripps
              National Spelling Bee in the USA.
            </p>
            <div class="mt-2 flex gap-2 font-extrabold text-sm">
              <a
                href="/src/spelling-bee-nepal.html"
                class="rounded-lg px-5 py-2 bg-neutral-900 text-white"
              >
                Read More
              </a>
              <a
                href="/src/spelling-bee-nepal.html#faq-section"
                class="rounded-lg px-5 py-2 bg-neutral-900 text-white"
              >
                Read FAQs
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="mt-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
          <div data-aos="fade-right" class="order-2 lg:order-1">
            <h1 class="text-[#FFD50D] font-extrabold text-2xl clear-left">
              About Evention Master
            </h1>
            <p
              class="mt-3 max-w-full lg:max-w-xl text-sm font-medium text-justify text-neutral-800 clear-left"
            >
              Evention Master stands out as the epitome of creativity,
              innovation, and inventiveness in the realm of event management.
              What truly distinguishes this company is its imaginative approach
              to every aspect of event planning. Our creative expression is
              displayed through each event we undertake, where ordinary venues
              are transformed into extraordinary spaces that reflect a theme
              with unparalleled artistry.<br /><br />

              The innovative strategies of Evention Master are what makes it
              stand out. We constantly push the boundaries of event management
              by introducing cutting-edge ideas and technologies, making then a
              unique approach. We add creative components to events that
              fascinate guests and enhance the overall experience, such as using
              virtual reality or utilizing the newest trends.<br /><br />

              Inventiveness is embedded in the DNA of Evention Master. We don’t
              just follow trends; we set them. We are dedicated to providing our
              clients with innovative and creative event solutions, and we do
              this by staying ahead of the curve in event tech, design, and
              execution. Choosing Evention Master means choosing an event
              management partner that doesn’t just organize events but crafts
              experiences that are truly one-of-a-kind.
            </p>
          </div>
          <div
            data-aos="fade-left"
            class="flex flex-col items-center justify-center order-1 lg:order-2"
          >
            <img src="/public/images/evention-master.png" alt="" class="pl-5" />
          </div>
        </div>
      </div>
    </div>

    <div class="mt-10">
      <div
        class="p-10 bg-gradient-to-r from-[#F1C820] via-[#FFD50D] to-[#F1C820] flex flex-col"
      >
        <div class="py-5 px-10 rounded-lg bg-white">
          <div class="flex flex-col sm:flex-row justify-between items-center">
            <div class="flex gap-3 items-center">
              <img
                src="/public/images/honeybee.png"
                alt=""
                class="h-20 sm:h-24 shrink-0"
              />
              <h1 class="text-xl text-[#FFD50D] font-extrabold">
                Winners of Spelling Bee Nepal 2023
              </h1>
            </div>
            <select name="year" title="select-year"
              class="w-max form-select block mt-1 rounded-md shadow-sm border border-[#FFD50D] text-neutral-700"
            >
              <option selected>Choose Year</option>
              <option>2024</option>
              <option>2023</option>
              <option>2022</option>
            </select>
          </div>

          <div class="mt-5 flex justify-center">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
              <div class="px-5 flex flex-col items-center gap-1">
                <h2 class="text-xl font-extrabold text-[#FFD50D]">Champion</h2>
                <div class="h-44 w-44 rounded-full bg-neutral-100"></div>
                <h3 class="text-lg font-extrabold text-neutral-800">
                  Sumin Shrestha
                </h3>
                <h4 class="text-sm text-neutral-500 font-bold">Class 10</h4>
                <h4 class="text-sm text-neutral-500 font-bold">
                  Holy Vision H.S. School
                </h4>
              </div>
              <div class="px-5 flex flex-col items-center gap-1">
                <h2 class="text-xl font-extrabold text-[#FFD50D]">
                  First Runner Up
                </h2>
                <div class="h-44 w-44 rounded-full bg-neutral-100"></div>
                <h3 class="text-lg font-extrabold text-neutral-800">
                  Sumin Shrestha
                </h3>
                <h4 class="text-sm text-neutral-500 font-bold">Class 10</h4>
                <h4 class="text-sm text-neutral-500 font-bold">
                  Holy Vision H.S. School
                </h4>
              </div>
              <div class="px-5 flex flex-col items-center gap-1">
                <h2 class="text-xl font-extrabold text-[#FFD50D]">
                  Second Runner Up
                </h2>
                <div class="h-44 w-44 rounded-full bg-neutral-100"></div>
                <h3 class="text-lg font-extrabold text-neutral-800">
                  Sumin Shrestha
                </h3>
                <h4 class="text-sm text-neutral-500 font-bold">Class 10</h4>
                <h4 class="text-sm text-neutral-500 font-bold">
                  Holy Vision H.S. School
                </h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="mt-10">
      <div class="px-5 sm:px-10 lg:px-20 2xl:px-36">
        <div
          class="uppercase text-center text-[#FFD50D] font-extrabold text-2xl"
        >
          Our Sponsors
        </div>
        <div class="mt-5">
          <div
            id="sponsors-container"
            class="owl-carousel owl-carousel-sponsors owl-theme z-10"
          >
            <script>
              const sponsors_list = [
                "/public/images/sponsors/sponsor-1.png",
                "/public/images/sponsors/sponsor-2.png",
                "/public/images/sponsors/sponsor-3.png",
                "/public/images/sponsors/sponsor-4.png",
                "/public/images/sponsors/sponsor-5.png",
                "/public/images/sponsors/sponsor-1.png",
                "/public/images/sponsors/sponsor-2.png",
                "/public/images/sponsors/sponsor-3.png",
                "/public/images/sponsors/sponsor-4.png",
                "/public/images/sponsors/sponsor-5.png",
              ];
              const sponsors = sponsors_list
                .map(
                  (sponsor) => `
              <div class="h-20 w-32">
              <img src="${sponsor}" alt="" class="h-full w-full object-fit">
            </div>
              `
                )
                .join("");
              document.getElementById("sponsors-container").innerHTML =
                sponsors;
            </script>
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

  <script>
    window.onload = function() {
      AOS.init({
        mirror: true
      });
    };
  </script>
  
</html>
