<x-base>

    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.store("accordion", {
                tab: 0
            , });

            Alpine.data("accordion", (idx) => ({
                init() {
                    this.idx = idx;
                }
                , idx: -1
                , handleClick() {
                    this.$store.accordion.tab =
                        this.$store.accordion.tab === this.idx ? 0 : this.idx;
                }
                , handleRotate() {
                    return this.$store.accordion.tab === this.idx ? "rotate-180" : "";
                }
                , handleToggle() {
                    return this.$store.accordion.tab === this.idx ?
                        `max-height: ${this.$refs.tab.scrollHeight}px` :
                        "";
                }
            , }));
        });

    </script>
    <div class="bg-neutral-800 text-white flex-grow h-full">
        <div class="pt-5 md:pt-10 px-5 sm:px-10 lg:px-20 2xl:px-36">
            <div>
                <div class="flex flex-col items-center justify-center md:float-right pb-10">
                    <img src="{{ ('/images/spelling-bee-nepal.png') }}" alt="" class="" />
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

            <div class="my-10 grid grid-cols-1 md:grid-cols-2 gap-5">
                <div id="faq-section" class="accordion-group order-2 scroll-mt-24" data-accordion="default-accordion">
                    <script>
                        const faqs = [{
                                question: "What is Spelling Bee Nepal?"
                                , answer: "Spelling Bee Nepal is a national-level competition where participants compete by spelling words correctly. It aims to improve vocabulary, enhance language skills, and promote academic excellence."
                            , }
                            , {
                                question: "Who can participate in Spelling Bee Nepal?"
                                , answer: "The competition is open to students from various age groups and educational levels, typically from primary to secondary schools. Specific eligibility criteria, such as age or grade, may apply depending on the category."
                            , }
                            , {
                                question: "How can I register for the competition?"
                                , answer: "You can register for Spelling Bee Nepal through our official website. Schools may also nominate students for participation. Registration deadlines and procedures will be announced in advance."
                            , }
                            , {
                                question: "What are the different stages of the competition?"
                                , answer: "The competition usually consists of multiple stages: Preliminary Round, Quarterfinals, Semifinals, and Final Round, where the top participants compete for the championship."
                            , }
                            , {
                                question: "How are the words chosen for the competition?"
                                , answer: "Words are carefully selected from a variety of sources, including dictionaries and academic word lists. The difficulty of the words increases as participants progress through the rounds."
                            , }
                            , {
                                question: "Can participants ask for a word's definition or origin?"
                                , answer: "Yes, participants are allowed to ask for the word's definition, origin (etymology), or use in a sentence to help them spell the word correctly."
                            , }
                            , {
                                question: "What happens if a participant misspells a word?"
                                , answer: "If a participant misspells a word, they are usually eliminated from the round. However, some competitions offer a second chance or bonus rounds depending on the rules."
                            , }
                            , {
                                question: "Are there any study materials or word lists available?"
                                , answer: "Yes, participants will receive study materials and word lists to prepare for the competition. These materials will cover words from different categories and levels of difficulty."
                            , }
                            , {
                                question: "How is the competition judged?"
                                , answer: "A panel of judges will oversee the competition. They will decide whether a word has been spelled correctly based on established dictionaries. Any disputes will be resolved by the judges."
                            , }
                            , {
                                question: "What are the prizes for the winners?"
                                , answer: "Winners of Spelling Bee Nepal will receive certificates, trophies, and exciting prizes. The top participants may also be eligible for scholarships, recognition, or other opportunities."
                            , }
                            , {
                                question: "Can parents or teachers attend the event?"
                                , answer: "Yes, parents and teachers are welcome to attend the event to support the participants. However, seating may be limited, and registration may be required for spectators."
                            , }
                            , {
                                question: "How long does the competition last?"
                                , answer: "The duration of the competition depends on the number of participants and rounds. Typically, it lasts several hours, with breaks in between rounds."
                            , }
                            , {
                                question: "What should participants wear for the competition?"
                                , answer: "Participants are encouraged to wear formal attire during the competition. Comfortable clothing is recommended, as the event may last several hours."
                            , }
                            , {
                                question: "Is there a fee to participate in Spelling Bee Nepal?"
                                , answer: "Yes, there may be a registration fee to participate. Fee details will be provided during the registration process."
                            , }
                            , {
                                question: "How can I stay updated on competition news and schedules?"
                                , answer: "You can stay updated by following our official website and social media channels. Important announcements, schedules, and updates will be shared regularly."
                            , }
                        , ];
                        const faqsList = faqs
                            .map(
                                (faq, index) => `
                                            <div class="bg-honey my-2 border-honey border-solid  border-x-0 border-t-0  border-gray-200 border-b" x-data="accordion(${index})">
                                    <h2
                                        @click="handleClick()"
                                        class="text-base text-primary flex flex-row justify-between items-center gap-5 font-semibold p-3 cursor-pointer"
                                    >
                                        <span class="text-neutral-800">${faq.question}</span>
                                        <svg
                                :class="handleRotate()"
                                class="fill-current text-neutral-800 h-6 w-6 transform transition-transform duration-500 shrink-0"
                                viewBox="0 0 20 20"
                                        >
                                <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                                        </svg>
                                    </h2>
                                    <div
                                        x-ref="tab"
                                        :style="handleToggle()"
                                        class="border-l-[5px] border-black overflow-hidden max-h-0 duration-500 transition-all"
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
                <div class="order-1 flex flex-col items-center self-center">
                    <img src="{{ ('/images/Questions-cuate.svg') }}" alt="" />
                </div>
            </div>
        </div>
    </div>
</x-base>
