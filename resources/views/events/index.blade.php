<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if ($events->count() == 0)
                    <p>No Events recorded!</p>
                    @else
                    <div class="">
                        <x-events :events=$events></x-events>
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
