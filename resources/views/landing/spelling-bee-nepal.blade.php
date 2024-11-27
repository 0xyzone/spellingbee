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
      <div class="pt-5 md:pt-10 px-5 sm:px-10 lg:px-20 2xl:px-36">
        <div>
          <div
            class="flex flex-col items-center justify-center md:float-right pb-10"
          >
            <img src="/public/images/spelling-bee-nepal.png" alt="" class="" />
          </div>
          <h1 class="text-2xl font-bold mb-2 text-[#FFD50D]">
            Spelling Bee in Nepal
          </h1>
          <div class="clear-left">
            <p class="text-justify">
              In the year 2010, Rotaract club of Charumati organized Spelling
              Bee in Nepal for the first time. The program was conducted at GAA
              Hall, Thamel and a total of 200 students from 100 different
              schools of Kathmandu valley participated in the event. In the
              event, Master Benish Shrestha from Galaxy Public School was the
              winner and Bibek Rauniyar and Arnav Singh were the first and
              second runner ups respectively.
              <br /><br />
              The competition was conducted in four rounds: Preliminary Round,
              Quarter Finals, Semi-Finals and Final with one participant winning
              the Championship final.
              <br /><br />
              In the 2-days event, in the first day, on 13th February, 200
              students competed in preliminary round and quarter final rounds.
              10 students advanced to the semifinal on that day. In the second
              day, semifinal round decided the top 5 contestants for the final;
              namely Benish Shrestha (Grade 10, Galaxy Public School), Bibek
              Rauniyar (Grade 10, Gillette International Boarding School), Arnav
              Singh (Grade 9, Little Angels School), Prasanna Karmacharya (Grade
              8, Little Angels School) and Sabita Ghimire (Grade 9, Motherland
              Academy).
              <br /><br />
              The Spelling Bee Champion for the year was awarded the
              Championship Trophy along with the medals to those who secured
              second and third positions.
            </p>
            <h3 class="text-xl font-bold my-2">Year 2024:</h3>
            <p class="text-justify">
              After a period of gap of 13 years, the event is now again, going
              to be organized by Evention Master. With the learning objective of
              “helping students improve their spelling, increase their
              vocabularies, learn concepts and develop correct English usage
              that will help them all their lives.”, we invites all the
              interested students and schools to participate in this edition of
              the competition.
            </p>
            <h3 class="text-xl font-bold my-2">Include:</h3>
            <p class="text-justify">
              Target group: (class 6-10, 16th birthday should not cross till
              final date)
            </p>
          </div>
        </div>

        <div class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-5">
          <div
            id="faq-section"
            class="accordion-group order-2 scroll-mt-24"
            data-accordion="default-accordion"
          >
            <script>
              const faqs = [
                {
                  question: "What is Spelling Bee Nepal?",
                  answer:
                    "Spelling Bee Nepal is a national-level competition where participants compete by spelling words correctly. It aims to improve vocabulary, enhance language skills, and promote academic excellence.",
                },
                {
                  question: "Who can participate in Spelling Bee Nepal?",
                  answer:
                    "The competition is open to students from various age groups and educational levels, typically from primary to secondary schools. Specific eligibility criteria, such as age or grade, may apply depending on the category.",
                },
                {
                  question: "How can I register for the competition?",
                  answer:
                    "You can register for Spelling Bee Nepal through our official website. Schools may also nominate students for participation. Registration deadlines and procedures will be announced in advance.",
                },
                {
                  question: "What are the different stages of the competition?",
                  answer:
                    "The competition usually consists of multiple stages: Preliminary Round, Quarterfinals, Semifinals, and Final Round, where the top participants compete for the championship.",
                },
                {
                  question: "How are the words chosen for the competition?",
                  answer:
                    "Words are carefully selected from a variety of sources, including dictionaries and academic word lists. The difficulty of the words increases as participants progress through the rounds.",
                },
                {
                  question:
                    "Can participants ask for a word's definition or origin?",
                  answer:
                    "Yes, participants are allowed to ask for the word's definition, origin (etymology), or use in a sentence to help them spell the word correctly.",
                },
                {
                  question: "What happens if a participant misspells a word?",
                  answer:
                    "If a participant misspells a word, they are usually eliminated from the round. However, some competitions offer a second chance or bonus rounds depending on the rules.",
                },
                {
                  question:
                    "Are there any study materials or word lists available?",
                  answer:
                    "Yes, participants will receive study materials and word lists to prepare for the competition. These materials will cover words from different categories and levels of difficulty.",
                },
                {
                  question: "How is the competition judged?",
                  answer:
                    "A panel of judges will oversee the competition. They will decide whether a word has been spelled correctly based on established dictionaries. Any disputes will be resolved by the judges.",
                },
                {
                  question: "What are the prizes for the winners?",
                  answer:
                    "Winners of Spelling Bee Nepal will receive certificates, trophies, and exciting prizes. The top participants may also be eligible for scholarships, recognition, or other opportunities.",
                },
                {
                  question: "Can parents or teachers attend the event?",
                  answer:
                    "Yes, parents and teachers are welcome to attend the event to support the participants. However, seating may be limited, and registration may be required for spectators.",
                },
                {
                  question: "How long does the competition last?",
                  answer:
                    "The duration of the competition depends on the number of participants and rounds. Typically, it lasts several hours, with breaks in between rounds.",
                },
                {
                  question:
                    "What should participants wear for the competition?",
                  answer:
                    "Participants are encouraged to wear their school uniforms or formal attire during the competition. Comfortable clothing is recommended, as the event may last several hours.",
                },
                {
                  question:
                    "Is there a fee to participate in Spelling Bee Nepal?",
                  answer:
                    "Yes, there may be a registration fee to participate. Fee details will be provided during the registration process.",
                },
                {
                  question:
                    "How can I stay updated on competition news and schedules?",
                  answer:
                    "You can stay updated by following our official website and social media channels. Important announcements, schedules, and updates will be shared regularly.",
                },
              ];
              const faqsList = faqs
                .map(
                  (faq, index) => `
                       <div class="bg-white my-2 border border-solid  border-x-0 border-t-0  border-gray-200 border-b" x-data="accordion(${index})">
                <h2
                  @click="handleClick()"
                  class="text-base text-primary flex flex-row justify-between items-center gap-5 font-semibold p-3 cursor-pointer"
                >
                  <span>${faq.question}</span>
                  <svg
            :class="handleRotate()"
            class="fill-current text-primary h-6 w-6 transform transition-transform duration-500 shrink-0"
            viewBox="0 0 20 20"
                  >
            <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                  </svg>
                </h2>
                <div
                  x-ref="tab"
                  :style="handleToggle()"
                  class="border-l-2 border-[#FFD50D] overflow-hidden max-h-0 duration-500 transition-all"
                >
                  <p class="p-3 text-sm font-medium text-gray-900">
            ${faq.answer}
                  </p>
                </div>
              </div>
                   `
                )
                .join("");
              document.getElementById("faq-section").innerHTML = faqsList;
            </script>
          </div>
          <div class="order-1 flex flex-col items-center">
            <img src="/public/images/Questions-cuate.svg" alt="" />
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
