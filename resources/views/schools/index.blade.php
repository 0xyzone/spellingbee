<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Schools') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 font-bold text-2xl flex justify-between">
                    <p>{{ __('List of Schools') }}</p>
                    <a href="{{ route('schools.create') }}">
                        <x-primary-button class="ml-3">
                            {{ __('Add school') }}
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
                    @if ($schools->count() == 0)
                        <p>No Schools recorded!</p>
                    @else
                        <div class="">
                            <div class="grid grid-cols-2 lg:grid-cols-3 -mx-4 text-gray-900">
                                @foreach ($schools as $var)
                                    <div class="w-full p-4">
                                        <div
                                            class="c-card block bg-white shadow-md hover:shadow-xl rounded-lg overflow-hidden">
                                            <div class="relative pb-48 overflow-hidden">
                                                <img class="absolute inset-0 h-full w-full object-cover"
                                                    src="{{ asset('img/home-office.jpg') }}" alt="">
                                            </div>
                                            <div class="p-4">
                                                <div class="flex gap-2">
                                                    @if ($var->school_type == 'private')
                                                        <span
                                                            class="inline-block px-2 py-1 leading-none bg-cyan-200 text-cyan-800 rounded-full font-semibold uppercase tracking-wide text-xs">{{ $var->school_type }}</span>
                                                    @elseif ($var->school_type == 'government')
                                                        <span
                                                            class="inline-block px-2 py-1 leading-none bg-orange-200 text-orange-800 rounded-full font-semibold uppercase tracking-wide text-xs">{{ $var->school_type }}</span>
                                                    @elseif ($var->school_type == 'community')
                                                        <span
                                                            class="inline-block px-2 py-1 leading-none bg-lime-200 text-lime-800 rounded-full font-semibold uppercase tracking-wide text-xs">{{ $var->school_type }}</span>
                                                    @endif

                                                    <a href="{{ route('schools.edit', $var) }}">
                                                        <i class="fa-regular fa-pencil"></i>
                                                    </a>
                                                </div>

                                                <h2 class="mt-2 mb-2  font-bold">{{ $var->name }}</h2>
                                                <div class="flex flex-col gap-1">
                                                    <p class="flex items-center text-sm"><i
                                                            class="fa-regular fa-user fa-fw mr-2 text-gray-900"></i>
                                                        {{ $var->contact_person_name }}
                                                    </p>
                                                    <p class="flex items-center text-sm"><i
                                                            class="fa-regular fa-phone fa-fw mr-2 text-gray-900"></i>
                                                        {{ $var->contact_number }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="p-4 border-t border-b text-xs text-gray-700">
                                                <span class="flex items-center mb-1">
                                                    <i class="far fa-clock fa-fw mr-2 text-gray-900"></i>
                                                    {{ $var->created_at->diffForHumans() }}
                                                </span>
                                                <span class="flex items-center mb-1"><i
                                                        class="fa-regular fa-location-dot fa-fw mr-2 text-gray-900"></i>
                                                    {{ $var->address }}</span>
                                                <span class="flex items-center"><i
                                                        class="fa-regular fa-at fa-fw mr-2 text-gray-900"></i>
                                                    {{ $var->email }}</span>
                                            </div>
                                            <div class="p-4 justify-center flex items-center text-sm text-gray-600">
                                                <a href="tel:{{ $var->contact_number }}">
                                                    <x-secondary-button class="ml-3">
                                                        <i
                                                            class="fa-regular fa-phone fa-fw mr-2"></i>{{ __('Call') }}
                                                    </x-secondary-button>
                                                </a>

                                                <a href="mailto:{{ $var->email }}">
                                                    <x-primary-button class="ml-3">
                                                        <i
                                                            class="fa-regular fa-at fa-fw mr-2 text-gray-900"></i>{{ __('Email') }}
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
        {{ $schools->links() }}
    </div>
</x-app-layout>
