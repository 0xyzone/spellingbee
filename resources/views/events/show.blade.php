<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $event->name }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/all.css'])
</head>

<body
    class="font-sans antialiased text-gray-100 leading-normal tracking-wider select-none bg-cover bg-center bg-no-repeat w-full h-screen"
    style="background-image:url('{{ url('/storage/' . $event->banner) }}');">
    <div class="w-full h-full backdrop-brightness-50 bg-gray-900/60 fixed top-0">
        <div class="max-w-4xl flex items-center h-auto lg:h-screen flex-wrap mx-auto my-32 lg:my-0">

            <!--Img Col-->
            <div class="w-full lg:w-3/6">
                <img src="{{ url('/storage/' . $event->logo) }}"
                    class="rounded-none lg:rounded-l-lg shadow-2xl hidden lg:block bg-white">

            </div>

            <!--Main Col-->
            <div id="profile" class="w-full lg:w-3/6 rounded-lg shadow-2xl bg-gray-900 opacity-9 mx-6 lg:mx-0">


                <div class="p-4 md:p-12 text-center lg:text-left">
                    <!-- Image for mobile view-->
                    <div class="block lg:hidden rounded-full shadow-xl mx-auto -mt-16 h-48 w-48 bg-cover bg-center"
                        style="background-image: url('{{ url('/storage/' . $event->logo) }}')"></div>

                    <h1 class="text-xl lg:text-3xl font-bold pt-8 lg:pt-0">{{ $event->name }} <span
                            class="text-gray-600 text-sm">({{ date('Y', strtotime($event->start_date)) }})</span> </h1>
                    <div class="mx-auto lg:mx-0 w-4/5 pt-3 border-b-2 border-yellow-500 opacity-25"></div>
                    <p class="pt-4 lg:text-base text-sm font-bold flex items-center justify-center lg:justify-start"><i
                            class="fa-regular fa-calendar text-yellow-500 pr-4 h-4"></i>
                        {{ date('jS M', strtotime($event->start_date)) . ' ~ ' . date('jS M', strtotime($event->end_date)) }}
                    </p>
                    <p
                        class="pt-2 text-gray-400 text-xs lg:text-sm flex items-center justify-center lg:justify-start pb-8">
                        <i class="fa-regular fa-location-dot text-yellow-500 pr-4 h-4"></i> {{ $event->address }}
                    </p>
                    <p
                        class="text-sm line-clamp-5 hover:line-clamp-none hover:overflow-y-auto max-h-48 sacroll hover:smooth">
                        {{ $event->description }} </p>
                    <p class="text-[0.65rem] text-yellow-500 animate-pulse py-2 w-full hidden lg:block"><i
                            class="fa-solid fa-info-circle"></i> Hover over description to
                        see full description</p>
                    <p class="text-xs text-yellow-500 animate-pulse py-2 w-full lg:hidden"><i
                            class="fa-solid fa-info-circle"></i> Tap on description to
                        see full description</p>

                    <div class="pt-12 pb-8">
                        @auth
                            @unless (Auth::user()->getPercentageCompleteAttribute() == 100)
                                Please complete your profile first! <a href="{{ route('profile.edit') }}"
                                    class="text-yellow-500 hover:text-yellow-600"> >> Click Here << </a>
                                    @else
                                        @unless ($registered->count() == 1) 
                                            <form action="{{ route('registrations.store') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                <input type="hidden" name="event_id" value="{{ $event->id }}">
                                                <input type="hidden" name="status" value="0">
                                                <button
                                                    class="bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded-full">
                                                    Register
                                                </button>
                                            </form>
                                            @else
                                            <p>You have already registered for the event!</p>
                                            <p>Registration status: </p>
                                        @endunless
                                    @endunless
                                @else
                                    <p class="pb-4">Login to your account to register!</p>
                                    <a href="{{ route('login') }}"
                                        class="bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded-full">
                                        Login
                                    </a>
                                @endauth
                    </div>

                </div>

            </div>

        </div>
    </div>

    <script src="https://unpkg.com/popper.js@1/dist/umd/popper.min.js"></script>
</body>

</html>
