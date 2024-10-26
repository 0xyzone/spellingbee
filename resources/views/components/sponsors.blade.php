{{-- Sponsors --}}
<div class="max-w-4xl w-5/6 flex flex-col justify-center items-center flex-wrap gap-4 mx-auto mb-32 bg-transparent rounded-2xl shadow-xl shadow-gray-950 py-8 mt-10 overflow-visible">
    <div class="text-2xl">
        Sponsors
    </div>
    <div class="flex flex-col gap-4">
        @if ($sponsors->count() == 0)
        <div class="flex flex-col gap-2 text-center">
            <p>No sponsors! We are on our own for now.</p>
            <p>Feel like collaborating? Give us a call at <a href="tel:+9779705998433" class="text-amber-500">+977 9705998433</a></p>
        </div>
        @else
        <div class="flex gap-4 justify-center nowrap overflow-x-auto overflow-y-hidden px-8 auto-cols-max w-full z-20 h-full">
            @foreach ($sponsors as $sponsor)
            <img src="{{ Storage::url($sponsor->sponsor_logo_path) }}" alt="{{ $sponsor->name }} logo" class="w-32 cursor-pointer hover:scale-105 duration-300 transform ease-in-out" onclick="document.getElementById('dialog{{ $sponsor->id }}').showModal()">
            <dialog id="dialog{{ $sponsor->id }}" class="py-8 ring-0 border-none bg-gray-800/85 text-white relative w-10/12 lg:w-4/12 duration-300 rounded-2xl shadow-xl shadow-gray-950 backdrop-blur-sm" onclick="close()">
                <div class="flex flex-col gap-2 items-center">
                    <img src="{{ Storage::url($sponsor->sponsor_logo_path) }}" alt="" class="shrink w-4/12">
                    <div onclick="stopPropagation()" class="w-max h-full shrink-0 flex flex-col items-center">
                        <p class="pb-4 text-2xl">{{ $sponsor->name }}</p>
                        <p class="pb-4">{{ $sponsor->description }}</p>
                        @if ($sponsor->url)
                        <a href="https://{{ ($sponsor->url) }}" target="_blank" class="bg-lime-600 text-white px-2 py-1 rouned-xl focus:outline-none rounded-lg hover:bg-lime-700 hover:scale-105 duration-150 ease-in-out">Visit them</a>
                        @endif
                    </div>
                </div>
            </dialog>
            @endforeach
            <script>
                const closeButton = $('button');
                // "Close" button closes the dialog
                closeButton.addEventListener("click", () => {
                    dialog.close();
                });

            </script>
        </div>
        <div class="flex flex-col gap-2 text-center">
            <p class="px-4">Want your logo among these? Give us a call at <a href="tel:+9779705998433" class="text-amber-500">+977 9705998433</a></p>
        </div>
        @endif
    </div>
</div>
{{-- Sponsors --}}