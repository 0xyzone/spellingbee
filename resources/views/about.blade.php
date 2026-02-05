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
        <div class="pt-5 md:pt-10 px-5 sm:px-10 lg:px-20 2xl:px-36 container mx-auto">
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
                    <h3 class="text-xl font-bold my-2">Year {{ now()->year }}:</h3>
                    <p class="text-justify">
                        After a period of gap of {{ now()->year - 2010 }} years, the event is now again, going
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
        </div>
    </div>
</x-base>
