<div class="grid md:grid-cols-2 lg:grid-cols-3 -mx-4 text-gray-900">
    @foreach ($events as $var)
    <div class="w-full p-4 relative hover:scale-105 duration-500 group">
        <div class="c-card block bg-white shadow-md group-hover:shadow-md group-hover:shadow-gray-600 duration-500 rounded-3xl overflow-hidden h-full">
            <div class="relative pb-48 overflow-hidden w-full">
                <div class="w-full h-full bg-amber-600/80 backdrop-blur-[1px] absolute top-0 z-20 rounded-t-3xl"></div>
                <img class="absolute inset-0 h-full w-full object-cover z-10" src="{{ $var->event_banner_path ? asset('storage/' . $var->event_banner_path) : asset('img/Spellingbeebg_1920x1080.png') }}" alt="">
                <p class="absolute z-20 right-0 top-2 px-2 py-1 text-white text-right shadow-lg {{ $var->registrationStatus() == 'not_started' ? 'bg-gray-500/50' : ($var->registrationStatus() == 'on_going' ? 'bg-amber-500/50' : 'bg-red-500/50') }}  text-[0.7rem] rounded-l-lg"><span>Registration</span><br>{{ $var->registrationStatus() == 'not_started' ? 'Not Started' : ($var->registrationStatus() == 'on_going' ? 'On going' : 'Ended') }}</p>
            </div>
            <div class="relative">
                <img src="{{ $var->event_logo_path ? asset('storage/' .$var->event_logo_path) : asset('img/defaultImage.png') }}" alt="logo" class="w-24 aspect-square rounded-full object-cover -mt-[3rem] z-20 absolute border-4 bg-white left-4">
                    <a href="{{ route('events.show', $var) }}" class="absolute right-4 top-2 z-20 bg-black/30 flex justify-center items-center w-max px-2 py-2 rounded-full hover:bg-gray-800 hover:!text-amber-500 hover:scale-105 hover:shadow-lg text-gray-500 duration-150" title="View event">
                        <i class="fas fa-eye text-xs"></i>
                    </a>
            </div>

            <div class="p-4">

                <h2 class="mt-8 mb-2  font-bold">{{ $var->name }}</h2>
                <div class="flex flex-col gap-1">
                    <p class="flex items-center text-sm"><i class="fa-solid fa-location-dot fa-fw mr-2 text-amber-600"></i>
                        {{ $var->venue }}
                    </p>
                    <div class="flex flex-col lg:flex-row gap-1 lg:gap-4">
                        <p class="flex items-center text-sm"><i class="fa-solid fa-flag-checkered fa-fw mr-2 text-amber-600"></i>
                            {{ date('jS M, Y', strtotime($var->start_date)) }}
                        </p>
                        <p class="flex items-center text-sm"><i class="fa-solid fa-power-off fa-fw mr-2 text-amber-600"></i>
                            {{ date('jS M, Y', strtotime($var->end_date)) }}
                        </p>
                    </div>

                    <p class="flex items-center text-sm line-clamp-3"><i class="fa-solid fa-note fa-fw mr-2 text-amber-600 flex-shrink-0"></i>
                        <span class="line-clamp-2">
                            {{ $var->description ?? 'No description' }}</span>
                    </p>
                    <h2 class="my-1 font-bold text-sm">Registration</h2>
                    <div class="flex flex-col lg:flex-row gap-1 lg:gap-4">
                        <p class="flex items-center text-sm"><i class="fa-solid fa-flag-checkered fa-fw mr-2 text-amber-600"></i>
                            {{ date('jS M, Y', strtotime($var->registration_start_date)) }}
                        </p>
                        <p class="flex items-center text-sm"><i class="fa-solid fa-power-off fa-fw mr-2 text-amber-600"></i>
                            {{ date('jS M, Y', strtotime($var->registration_end_date)) }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="p-4 border-t border-b text-xs text-gray-700">
                <span class="flex items-center mb-1">
                    <i class="far fa-clock fa-fw mr-2 text-gray-900"></i>
                    {{ 'Created '.$var->created_at->diffForHumans() }}
                </span>
            </div>
            <div class="p-4 text-sm text-gray-600 bg-gray-300 h-full text-center">
                @if ($var->registrationStatus() == 'on_going')
                @unless (Auth::user()->isComplete() == true)
                Please complete your profile first! <a href="{{ route('profile.edit') }}"> <button class="bg-amber-500 hover:bg-amber-600 hover:text-gray-200 duration-300 shadow hover:shadow-lg px-2 py-1 rounded-lg">Click Here</button> </a>
                @else
                @unless (auth()->user()->registrationStatus($var->id) != "Not registered")
                <form action="{{ route('event-registrations.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="event_id" value="{{ $var->id }}">
                    <input type="hidden" name="status" value="pending">
                    <button class="bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded-full">
                        Register
                    </button>
                </form>
                @else
                <p class="py-2 flex items-center gap-2 w-full justify-center">Registration status: <span class="text-xs px-4 py-2 rounded-full text-white {{ (auth()->user()->registrationStatus($var->id) == 'Approved') ? 'bg-lime-600' : ((auth()->user()->registrationStatus($var->id) == 'Declined') ? 'bg-red-600' : 'bg-gray-600') }}">{{ auth()->user()->registrationStatus($var->id) }}</span>
                </p>
                @endunless
                @endunless
                @elseif($var->registrationStatus() == 'ended')
                <p class="py-2 flex items-center gap-2 w-full justify-center">Registration already ended!</p>
                @else
                <p class="py-2 flex items-center gap-2 w-full justify-center">Registration has not started yet!</p>
                @endif
                <form action="" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="event_id" value="{{ $var->id }}">
                    <input type="hidden" name="status" value="pending">
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>