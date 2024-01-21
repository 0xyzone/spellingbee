<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Events') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 font-bold text-2xl flex justify-between">
                    <p>{{ __('List of Events') }}</p>
                    <a href="{{ route('events.create') }}">
                        <x-primary-button class="ml-3">
                            {{ __('Add event') }}
                        </x-primary-button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if ($events->count() == 0)
                        <p>No Events recorded!</p>
                    @else
                        <div class="">
                            <div class="grid md:grid-cols-2 lg:grid-cols-3 -mx-4 text-gray-900">
                                @foreach ($events as $var)
                                    <div class="w-full p-4 relative">
                                        <div
                                            class="c-card block bg-white shadow-md hover:shadow-xl rounded-lg overflow-hidden h-full">
                                            <div class="relative pb-48 overflow-hidden">
                                                <img class="absolute inset-0 h-full w-full object-cover z-10"
                                                    src="{{ $var->banner ? asset('storage/' . $var->banner) : asset('img/home-office.jpg') }}"
                                                    alt="">
                                            </div>
                                            <div>
                                                <img src="{{ $var->logo ? asset('storage/' . $var->logo) : '' }}"
                                                    alt="logo"
                                                    class="w-24 aspect-square rounded-full object-cover -mt-[3rem] z-20 absolute border-4 bg-white left-8">
                                            </div>

                                            <div class="p-4">

                                                <h2 class="mt-8 mb-2  font-bold">{{ $var->name }}</h2>
                                                <div class="flex flex-col gap-1">
                                                    <p class="flex items-center text-sm"><i
                                                            class="fa-regular fa-location-pin fa-fw mr-2 text-gray-900"></i>
                                                        {{ $var->address }}
                                                    </p>
                                                    <p class="flex items-center text-sm"><i
                                                            class="fa-sharp fa-solid fa-flag-checkered fa-fw mr-2 text-gray-900"></i>
                                                        {{ $var->start_date }}
                                                    </p>
                                                    <p class="flex items-center text-sm"><i
                                                            class="fa-regular fa-power-off fa-fw mr-2 text-gray-900"></i>
                                                        {{ $var->end_date }}
                                                    </p>
                                                    <p class="flex items-center text-sm"><i
                                                            class="fa-regular fa-note fa-fw mr-2 text-gray-900"></i>
                                                        {{ $var->description ?? 'No description' }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="p-4 border-t border-b text-xs text-gray-700">
                                                <span class="flex items-center mb-1">
                                                    <i class="far fa-clock fa-fw mr-2 text-gray-900"></i>
                                                    {{ $var->created_at->diffForHumans() }}
                                                </span>
                                            </div>
                                            <div class="p-4 justify-center flex items-center text-sm text-gray-600">
                                                <a href="{{ route('events.show', $var) }}">
                                                    <x-secondary-button class="ml-3">
                                                        <i class="fa-regular fa-eye fa-fw mr-2"></i>{{ __('View') }}
                                                    </x-secondary-button>
                                                </a>

                                                <a href="{{ route('events.edit', $var) }}">
                                                    <x-primary-button class="ml-3">
                                                        <i
                                                            class="fa-regular fa-pencil fa-fw mr-2 text-gray-900"></i>{{ __('Edit') }}
                                                    </x-primary-button>
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="mt-4">
        {{ $events->links() }}
    </div>
</x-app-layout>
