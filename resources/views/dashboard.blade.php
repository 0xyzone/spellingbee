<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="pt-12 pb-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Welcome! to Spelling Bee") }}
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pb-4">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg pb-6">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                {{ __("Events") }}
            </div>
            <div class="px-6">
                <x-events :events=$events></x-events>
                <div class="mt-4">
                    {{ $events->links() }}
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pb-4">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg pb-6">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                {{ __("Test Samples") }}
            </div>
            <div class="px-6">
                @livewire('test-samples')
            </div>
        </div>
    </div>
</x-app-layout>
