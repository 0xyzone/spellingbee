<div class="mt-10">
    <div class="px-5 sm:px-10 lg:px-20 2xl:px-36">
        <div class="uppercase text-center text-[#FFD50D] font-extrabold text-2xl">
            Our Sponsors
        </div>
        <div class="mt-5">
            <div id="sponsors-container" class="owl-carousel owl-carousel-sponsors owl-theme z-10">
                <script>
                    const sponsors_list = [
                        "/public/images/sponsors/sponsor-1.png"
                        , "/public/images/sponsors/sponsor-2.png"
                        , "/public/images/sponsors/sponsor-3.png"
                        , "/public/images/sponsors/sponsor-4.png"
                        , "/public/images/sponsors/sponsor-5.png"
                        , "/public/images/sponsors/sponsor-1.png"
                        , "/public/images/sponsors/sponsor-2.png"
                        , "/public/images/sponsors/sponsor-3.png"
                        , "/public/images/sponsors/sponsor-4.png"
                        , "/public/images/sponsors/sponsor-5.png"
                    , ];
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
