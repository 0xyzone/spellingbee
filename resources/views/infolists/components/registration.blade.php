<x-dynamic-component :component="$getEntryWrapperView()">
    <style>
        i {
            color: rgb(251 191 36 / 1);
        }
    </style>
    <div class="flex flex-col lg:flex-row gap-4 lg:!gap-10 items-center justify-center lg:justify-start border rounded-2xl h-max px-8 py-8 shrink grow-0 w-auto">
        @if ($getRecord()->user->avatar) 
            <img src="{{ Storage::url($getRecord()->user->avatar->user_avatar_path) }}" alt="" class="w-64 h-64 rounded-2xl shadow-lg shadow-gray-950">
        @endif
        <div class="space-y-6">
            <h1 class="font-bold text-2xl">Personal Details</h1>
            <div class="w-full">
                <i class="fas fa-user w-8 text-center"></i>
                <span>{{ $getRecord()->user->name }}</span>
            </div>
            <div class="w-full">
                <i class="fas fa-cake-candles w-8 text-center"></i>
                <span>{{ $getRecord()->user->age() }} years ({{ Carbon\Carbon::parse($getRecord()->user->date_of_birth)->format('jS M, Y') }})</span>
            </div>
            <div class="">
                <i class="fas fa-location-dot w-8 text-center"></i>
                <span>{{ $getRecord()->user->address }}</span>
            </div>
            <div class="">
                <i class="fas fa-address-book w-8 text-center"></i>
                <span>{{ $getRecord()->user->contact_number }}</span>
            </div>
            <div class="">
                <i class="fas fa-school w-8 text-center"></i>
                <span>{{ $getRecord()->user->school }}</span>
            </div>
        </div>
    </div>
</x-dynamic-component>
