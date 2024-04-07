<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <title>{{ $event->name }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/all.css'])
</head>

<body class="font-sans antialiased text-gray-100 leading-normal tracking-wider select-none bg-cover bg-center bg-no-repeat w-full min-h-screen bg-white overflow-y-auto" style="background-image:url('{{ $event->event_banner_path == null ? '' : url('/storage/' . $event->event_banner_path) }}');">
    <div class="w-full h-full backdrop-brightness-50 bg-gray-900/60 fixed top-0 overflow-auto">
        <div class="max-w-4xl flex items-center flex-wrap mx-auto mt-32">

            <!--Img Col-->
            <div class="w-full lg:w-3/6">
                <img src="{{ $event->event_logo_path == null ? '/img/defaultImage.png' : url('/storage/' . $event->event_logo_path) }}" class="rounded-none lg:rounded-3xl shadow-lg shadow-gray-950 hidden lg:block bg-white object-cover w-full aspect-square translate-x-4">

            </div>

            <!--Main Col-->
            <div id="profile" class="w-full lg:w-3/6 rounded-3xl shadow-[rgba(0,0,0,0.8)_5px_5px_15px_0px] bg-gray-900 opacity-9 mx-6 lg:mx-0">


                <div class="p-4 md:p-12 text-center lg:text-left">
                    <span class="items-center text-[0.6rem] text-gray-500 gap-1 mb-1 lg:flex hidden">
                        <p>{{ 'Created '.$event->created_at->diffForHumans() }}</p>
                    </span>
                    <!-- Image for mobile view-->
                    <div class="block lg:hidden rounded-full shadow-xl mx-auto -mt-16 h-48 w-48 bg-cover bg-center bg-white" style="background-image: url('{{ $event->event_logo_path == null ? '/img/defaultImage.png' : url('/storage/' . $event->event_logo_path) }}')"></div>
                    <p class="items-center text-[0.6rem] text-gray-500 gap-1 lg:hidden pt-2">
                        <span>{{ 'Created '.$event->created_at->diffForHumans() }}</span>
                    </p>

                    <h1 class="text-xl lg:text-3xl font-bold lg:pt-0 flex-wrap flex flex-col lg:flex-row justify-center items-center lg:justify-start gap-2">
                        <p>{{ $event->name }}</p>
                        <span class="text-gray-600 text-sm">
                            ({{ date('Y', strtotime($event->start_date)) }})
                        </span>
                        <span class="text-amber-950 text-xs px-2 py-0.5 bg-amber-500 rounded-full capitalize w-max">
                            ● {{ $event->event_type }} Event
                        </span>
                    </h1>
                    <div class="mx-auto lg:mx-0 w-4/5 lg:w-full pt-3 border-b-2 border-gray-700 opacity-25"></div>
                    <h2 class="mt-4 mb-2 font-bold text-sm">Event Details</h2>
                    <div class="text-base flex flex-col lg:flex-row gap-1 lg:gap-4 items-center lg:items-start">
                        <p class="flex items-center"><i class="fa-solid fa-flag-checkered fa-fw mr-2 text-amber-500"></i>
                            {{ date('jS M, Y', strtotime($event->start_date)) }}
                        </p>
                        <p class="flex items-center"><i class="fa-solid fa-power-off fa-fw mr-2 text-amber-500"></i>
                            {{ date('jS M, Y', strtotime($event->end_date)) }}
                        </p>
                    </div>
                    @if ($event->venue)
                    <p class="pt-2 lg:text-base flex items-center justify-center lg:justify-start">
                        <i class="fa-regular fa-location-dot text-amber-500 pr-4 h-4"></i> {{ $event->venue }}
                    </p>
                    @endif
                    <div class="mx-auto lg:mx-0 w-4/5 lg:w-full pt-3 border-b-2 border-gray-700 opacity-25"></div>
                    <h2 class="mt-4 mb-2 font-bold text-sm">Registration</h2>
                    <div class="flex flex-col lg:flex-row gap-1 lg:gap-4 items-center lg:items-start">
                        <p class="flex items-center text-sm"><i class="fa-solid fa-flag-checkered fa-fw mr-2 text-amber-500"></i>
                            {{ date('jS M, Y', strtotime($event->registration_start_date)) }}
                        </p>
                        <p class="flex items-center text-sm"><i class="fa-solid fa-power-off fa-fw mr-2 text-amber-500"></i>
                            {{ date('jS M, Y', strtotime($event->registration_end_date)) }}
                        </p>
                    </div>
                    <div class="mx-auto lg:mx-0 w-4/5 lg:w-full pt-4 mb-3 border-b-2 border-gray-700 opacity-25"></div>
                    @if ($event->description)
                    <p id='elem' class="text-sm line-clamp-5 hover:line-clamp-none hover:overflow-y-auto max-h-full sacroll smooth ease-in-out">
                        {{ $event->description }} </p>
                    <p class="prompt1 text-[0.65rem] text-amber-500 animate-pulse py-2 w-full hidden"><i class="fa-solid fa-info-circle"></i> Hover over description to
                        see full description if this not complete</p>
                    <p class="prompt2 text-xs text-amber-500 animate-pulse py-2 w-full lg:hidden"><i class="fa-solid fa-info-circle"></i> Tap on description to
                        see full description if this not complete</p>
                    <div class="mx-auto lg:mx-0 w-4/5 lg:w-full pt-4 mb-3 border-b-2 border-gray-700 opacity-25"></div>
                    @endif
                    <script>
                        const isTextClamped = elm => elm.scrollHeight > elm.clientHeight

                        new ResizeObserver(e => {
                            console.clear()
                            console.log(isTextClamped(e[0].target))
                            if (isTextClamped(e[0].target) === true) {
                                $(".prompt1").addClass('lg:block')
                                $(".prompt2").removeClass('hidden')
                            } else {
                                $(".prompt1").removeClass('lg:block')
                                $(".prompt2").addClass('hidden')
                            }
                        }).observe(elem);

                    </script>

                    <div class="pb-2">
                        @auth
                        @if ($event->registrationStatus() == 'on_going')
                        @unless (Auth::user()->isComplete() == true)
                        Please complete your profile first! <a href="{{ route('profile.edit') }}" class="text-amber-500 hover:text-amber-600"> >> Click Here << </a>
                                @else
                                @unless (auth()->user()->registrationStatus($event->id) != "Not registered")
                                <form action="{{ route('event-registrations.store') }}" method="post" class="pt-8">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="event_id" value="{{ $event->id }}">
                                    <input type="hidden" name="status" value="pending">
                                    <button class="bg-amber-600 hover:bg-amber-700 text-white font-bold py-2 px-4 rounded-full">
                                        Register
                                    </button>
                                </form>
                                @else
                                <p class="pt-4">You have already registered for the event!</p>
                                <p class="py-2 flex items-center gap-2">Registration status: <span class="text-xs px-4 py-2 rounded-full {{ (auth()->user()->registrationStatus($event->id) == 'Approved') ? 'bg-lime-600' : ((auth()->user()->registrationStatus($event->id) == 'Declined') ? 'bg-red-600' : 'bg-gray-600') }}">{{ auth()->user()->registrationStatus($event->id) }}</span></p>
                                @endunless
                                @endunless
                                @elseif($event->registrationStatus() == 'ended')
                                <p class="mt-2">Registration already ended!</p>
                                @else
                                <p class="mt-2">Registration has not started yet!</p>
                                @endif
                                @else
                                <p class="pb-4">Login to your account to register!</p>
                                <a href="{{ route('login') }}" class="bg-amber-600 hover:bg-amber-700 text-white font-bold py-2 px-4 rounded-full">
                                    Login
                                </a>
                                @endauth
                    </div>

                </div>

            </div>

        </div>
        <div class="max-w-4xl w-5/6 flex flex-col justify-center items-center flex-wrap gap-4 mx-auto mb-32 bg-gray-900 rounded-2xl shadow-xl shadow-gray-950 py-8 mt-10 overflow-visible">
            <div class="text-2xl">
                Sponsors
            </div>
            <div class="flex flex-col gap-4">
                @if ($event->sponsors->count() == 0)
                <div class="flex flex-col gap-2 text-center">
                    <p>No sponsors! We are on our own for now.</p>
                    <p>Feel like collaborating? Give us a call at <a href="tel:+9779801234567" class="text-amber-500">+977 9801234567</a></p>
                </div>
                @else
                <div class="flex gap-4 justify-center nowrap overflow-x-auto overflow-y-hidden px-8 auto-cols-max w-full z-20 h-full">
                    @foreach ($event->sponsors as $sponsor)
                    <img src="{{ Storage::url($sponsor->sponsor->sponsor_logo_path) }}" alt="{{ $sponsor->sponsor->name }} logo" class="w-32 cursor-pointer hover:scale-105 duration-300 transform ease-in-out" onclick="document.getElementById('dialog{{ $sponsor->id }}').showModal()">
                    <dialog id="dialog{{ $sponsor->id }}" class="py-8 ring-0 border-none bg-gray-800/85 text-white relative w-10/12 lg:w-4/12 duration-300 rounded-2xl shadow-xl shadow-gray-950 backdrop-blur-sm" onclick="close()">
                        <div class="flex flex-col gap-2 items-center">
                            <img src="{{ Storage::url($sponsor->sponsor->sponsor_logo_path) }}" alt="" class="shrink w-4/12">
                            <div onclick="stopPropagation()" class="w-max h-full shrink-0 flex flex-col items-center">
                                <p class="pb-4 text-2xl">{{ $sponsor->sponsor->name }}</p>
                                <p class="pb-4">{{ $sponsor->sponsor->description }}</p>
                                @if ($sponsor->sponsor->url)
                                <a href="https://{{ ($sponsor->sponsor->url) }}" target="_blank" class="bg-lime-600 text-white px-2 py-1 rouned-xl focus:outline-none rounded-lg hover:bg-lime-700 hover:scale-105 duration-150 ease-in-out">Visit them</a>
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
                    <p class="px-4">Want your logo among these? Give us a call at <a href="tel:+9779801234567" class="text-amber-500">+977 9801234567</a></p>
                </div>
                @endif
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/popper.js@1/dist/umd/popper.min.js"></script>
</body>

</html>
