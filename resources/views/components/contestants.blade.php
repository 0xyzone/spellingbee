<div class="grid md:grid-cols-2 lg:grid-cols-3 -mx-4 text-gray-900">
    @foreach ($contestants as $var)
    <div class="w-full p-4 relative hover:scale-105 duration-500 group">
        <div class="c-card block bg-white shadow-md group-hover:shadow-md group-hover:shadow-gray-600 duration-500 rounded-3xl overflow-hidden h-full">
            <div class="flex justify-center px-4 pt-4">
                <img src="{{ $var->user->avatar ? asset('storage/' .$var->user->avatar->user_avatar_path) : asset('img/defaultImage.png') }}" alt="{{ $var->user->name }}_avatar" class="w-full aspect-square rounded-2xl object-cover border-4 bg-white left-4">
            </div>

            <div class="p-4">
                <h2 class="font-bold">{{ $var->user->name }} </h2>
                <div class="flex flex-col gap-1">
                    <p class="flex items-center text-xs">
                        <i class="fa-solid fa-cake-candles fa-fw mr-2 text-amber-600"></i>
                        {{ $var->user->age }} years young
                    </p>
                    <p class="flex items-center text-xs">
                        <i class="fa-solid fa-school fa-fw mr-2 text-amber-600"></i>
                        {{ $var->user->school }}
                    </p>
                </div>
            </div>
            <div class="p-4 border-t border-b text-xs text-gray-700">
                <span class="flex justify-center items-center mb-1">
                    <i class="far fa-hashtag fa-fw mr-2 text-gray-900"></i>
                    <p>Contestant No. <span class="text-amber-600 font-bold">{{ $var->user->id }}</span></p>
                </span>
            </div>
        </div>
    </div>
    @endforeach
</div>