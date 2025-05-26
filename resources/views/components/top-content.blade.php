<div class="border-x-0 border-t-0 w-full h-full bg-neutral-500 flex flex-col z-20">
    <div class="relative flex-grow overflow-hidden pt-5 md:pt-10 px-5 sm:px-10 lg:px-20 2xl:px-36">
        <div class="z-50 flex justify-between gap-2">
            <div class="mt-0 2xl:mt-5 flex flex-col gap-1 max-w-2xl 2xl:max-w-full">
                <h1 class="z-20 text-[2rem] sm:text-6xl xl:text-[4rem] 2xl:text-[5.5rem] text-[#FFD316] font-aclonica overflow-hidden break-normal hyphens-auto flex-none md:flex-auto leading-tight">
                    SPELLING BEE CHAMPIONSHIP 2024
                    {{-- <span style="position: relative; top: -3px" class="align-middle bg-neutral-900 text-[0.8rem] lg:text-base py-2 px-2 lg:px-5 text-white font-aclonica font-bold">
                        <span>22<sup>th</sup>&nbsp;Dec.</span>&nbsp;-&nbsp;<span>28<sup>th</sup>&nbsp;Dec. &nbsp;|&nbsp; Kathmandu</span>
                    </span> --}}
                </h1>
                <p class="mt-2 text-sm 2xl:text-base font-semibold text-neutral-800 z-20 max-w-2xl text-justify">
                    An exciting competition where participants can showcase their
                    spelling skills and vocabulary knowledge encouraging learning
                    and sharpening language abilities.
                </p>
                <p class="mt-2 text-sm 2xl:text-base font-semibold text-neutral-800 z-20 max-w-2xl text-justify">
                    In the hall of champions, Spelling Bee esteemed,
                    Young intellects gather, each a wordsmith deemed.
                    Their minds are sharp, with knowledge they beam,
                    Every word a testament to their scholarly dream.
                    Victory is wisdom, in the academic stream.
                </p>
                {{-- <div class="mt-2 w-full sm:w-max text-sm 2xl:text-base font-semibold text-white bg-black py-3 px-5 rounded-md z-20 max-w-2xl break-words">
                </div> --}}
                <script>
                    const firstDate = "31/10/2024";
                    const secondDate = "30/04/2025";
                    const thirdDate = "31/05/2025";

                    const today = new Date();
                    const todayFormatted = `${String(today.getDate()).padStart(2, '0')}/${String(today.getMonth() + 1).padStart(2, '0')}/${today.getFullYear()}`;

                    // Function to convert date strings (dd/mm/yyyy) to Date objects for comparison
                    function parseDate(dateString) {
                        const [day, month, year] = dateString.split('/');
                        return new Date(`${year}-${month}-${day}`);
                    }

                    $(document).ready(function() {
                        const todayDate = parseDate(todayFormatted);
                        const firstDateObj = parseDate(firstDate);
                        const secondDateObj = parseDate(secondDate);
                        const thirdDateObj = parseDate(thirdDate);

                        // Apply line-through and opacity if today's date is past the respective dates
                        if (todayDate > firstDateObj) {
                            $("#first").addClass("line-through opacity-10");
                            $("#first").removeClass("animate-pulse");
                            $("#second").addClass("animate-pulse payment-button cursor-pointer");
                        }

                        if (todayDate > secondDateObj) {
                            $("#second").addClass("line-through opacity-10");
                            $("#second").removeClass("animate-pulse payment-button cursor-pointer");
                            $("#third").addClass("animate-pulse payment-button cursor-pointer");
                        }

                        if (todayDate > thirdDateObj) {
                            $("#third").addClass("line-through opacity-10");
                            $("#third").removeClass("animate-pulse");
                        }
                    })

                </script>
                <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-4 slabs">
                    <div id="first" class="h-max bg-gray-200 flex flex-col rounded-lg p-4 items-center lg:mx-0 line animate-pulse">
                        <p class="font-bold text-sm sm:text-base">1st Slab</p>
                        <p class="font-bold text-3xl sm:text-4xl lg:text-5xl 2xl:text-6xl flex pb-3">
                            <span class="text-xl self-start overflow-hidden">Rs.</span><span class="overflow-hidden">300</span><span class="text-xl self-end">.00</span>
                        </p>
                        <p class="w-full text-sm text-center py-2 rounded-lg bg-neutral-900 text-white font-bold">
                            Till 31 Oct. 2024
                        </p>
                    </div>

                    <div id="second" class="h-max bg-neutral-800 flex flex-col rounded-lg p-4 items-center text-white payment-button">
                        <p class="font-bold text-sm sm:text-base">2nd Slab</p>
                        <p class="font-bold text-3xl sm:text-4xl lg:text-5xl 2xl:text-6xl flex pb-3">
                            <span class="text-xl self-start">Rs.</span><span class="overflow-hidden">500</span><span class="text-xl self-end">.00</span>
                        </p>
                        <p class="w-full text-sm text-center py-2 rounded-lg bg-neutral-200 text-neutral-800 font-bold">
                            Till 30 Apr. 2025
                        </p>
                    </div>

                    <div id="third" class="h-max bg-gray-200 flex flex-col rounded-lg p-4 items-center payment-button">
                        <p class="font-bold text-sm sm:text-base">3rd Slab</p>
                        <p class="font-bold text-3xl sm:text-4xl lg:text-5xl 2xl:text-6xl flex pb-3">
                            <span class="text-xl self-start">Rs.</span><span class="overflow-hidden">1000</span><span class="text-xl self-end">.00</span>
                        </p>
                        <p class="w-full text-sm text-center py-2 rounded-lg bg-neutral-900 text-white font-bold">
                            Till August. 2025
                        </p>
                    </div>
                </div>
                <div class="flex gap-2 items-center">
                    <a href="{{ route('register') }}" class="mt-5 w-max px-5 py-2 text-base md:text-xl 2xl:text-2xl bg-honey text-neutral-900 rounded-lg shadow-lg animate-bounce hover:bg-lime-600 transform duration-300">
                        Register Now
                    </a>
                    <p class="text-white py-2 mt-5 ">or</p>
                    <a href="{{ route('login') }}" class="mt-5 w-max px-5 py-2 text-base md:text-xl 2xl:text-2xl text-honey border border-current rounded-lg shadow-lg hover:bg-honey hover:text-gray-900 transform duration-300">
                        Login
                    </a>
                </div>
            </div>
            <div class="hidden xl:block relative shrink-0">
                <img src="{{ asset('images/honeybee.png') }}" alt="" class="z-[9999] h-72 md:h-96 2xl:h-[500px] select-none shrink-0" />
            </div>
        </div>
        <div class="bg-honey rounded-lg mt-4 max-w-5xl flex flex-col gap-1 items-center p-1 pb-3">
            <h2 class="text-center text-xs lg:text-xl">Confused on how to register? Check out the video below!</h2>
            <iframe class="border-2 rounded-lg border-honey w-[95%] lg:w-[98%] aspect-video" src="https://www.youtube.com/embed/u5ZYI15SBjQ?si=mrQJ2w7jfWJ4bE1c" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
    </div>
    <div class="separator"></div>
    <div class="mt-0 bg-black px-5 sm:px-10 lg:px-24 xl:px-52 py-10 sm:py-4">
        <img src="{{ ('images/prize-banner.png') }}" alt="" class="w-full h-full object-fit" />
    </div>
</div>
