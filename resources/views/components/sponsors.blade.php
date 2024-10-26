<div class="mt-10">
    <div class="px-5 sm:px-10 lg:px-20 2xl:px-36">
        <div class="uppercase text-center text-[#FFD50D] font-extrabold text-2xl">
            Our Sponsors
        </div>
        <div class="mt-5">
            {{-- {{ dd($sponsors) }} --}}
            <div id="sponsors-container" class="owl-carousel owl-carousel-sponsors owl-theme z-10 flex justify-center">
                <script>
                    const sponsors_list = [
                        @foreach ($sponsors as $var)
                            '{{ asset('/storage/' . $var['sponsor_logo_path']) }}',
                        @endforeach
                    , ];
                    const sponsors = sponsors_list
                        .map(
                            (sponsor) => `
                                    <div class="h-32 w-32">
                                        <img src="${sponsor}" alt="" class="h-auto w-full object-scale-down">
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
