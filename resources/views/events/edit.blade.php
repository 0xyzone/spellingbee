<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex gap-2 items-end">
            {{ __('Edit Event') }}
            @if (session('status') === 'event-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-lime-600 dark:text-lime-400">{{ __('Saved.') }}</p>
            @endif
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 font-bold text-2xl">
                    <form method="POST" action="{{ route('events.update', $event) }}" enctype="multipart/form-data">
                        @csrf
                        @method('patch')

                        <input type="hidden" name="last_url" value="{{ URL::previous() }}">
                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Event Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name', $event->name)" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        
                        <!-- Address -->
                        <div>
                            <x-input-label for="address" :value="__('Event Address')" />
                            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address"
                                :value="old('address', $event->address)" required autocomplete="address" />
                            <x-input-error :messages="$errors->get('address')" class="mt-2" />
                        </div>

                        <!-- Description -->
                        <div class="mt-4">
                            <x-input-label for="description" :value="__('Event Description')" />
                            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description"
                                :value="old('description', $event->description)" required />
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <!-- Start Date -->
                        <div class="mt-4">
                            <x-input-label for="start_date" :value="__('Start Date')" />
                            <x-text-input id="start_date" class="block mt-1 w-full" type="date" name="start_date"
                                :value="old('start_date', $event->start_date)" required />
                            <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
                        </div>

                        <!-- Start Date -->
                        <div class="mt-4">
                            <x-input-label for="end_date" :value="__('End Date')" />
                            <x-text-input id="end_date" class="block mt-1 w-full" type="date" name="end_date"
                                :value="old('end_date', $event->end_date)" required />
                            <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
                        </div>

                        <!-- Logo -->
                        <div class="mt-4">
                            <x-input-label for="logo" :value="__('Logo (should be in 1:1 ratio)')" />
                            <div class="flex gap-4 my-4 mb-8 w-full">
                                <input type="file" name="logo" id="logo"
                                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-yellow-500 dark:focus:border-yellow-600 focus:ring-yellow-500 dark:focus:ring-yellow-600 rounded-md shadow-sm text-sm"
                                    hidden>
                                <img id="preview"
                                    src="{{ $event->logo ? asset('storage/' . $event->logo) : asset('img/upload.png') }}"
                                    alt="your image" class="h-32 aspect-square object-cover rounded-lg"
                                    onclick="$('#logo').trigger('click')" />
                                @push('scripts')
                                    <script>
                                        logo.onchange = evt => {
                                            preview = document.getElementById('preview');
                                            preview.style.display = 'block';
                                            const [file] = logo.files
                                            if (file) {
                                                preview.src = URL.createObjectURL(file)
                                            }
                                        }
                                    </script>
                                @endpush
                            </div>
                            <x-input-error :messages="$errors->get('logo')" class="mt-2" />

                        </div>

                        <!-- Banner -->
                        <div class="mt-4">
                            <x-input-label for="banner" :value="__('Banner (should be in 16:9 ratio)')" />
                            <div class="flex gap-4 my-4 mb-8 w-full">
                                <input type="file" name="banner" id="banner"
                                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-yellow-500 dark:focus:border-yellow-600 focus:ring-yellow-500 dark:focus:ring-yellow-600 rounded-md shadow-sm text-sm"
                                    hidden>
                                <img id="preview2"
                                    src="{{ $event->banner ? asset('storage/' . $event->banner) : asset('img/banner.png') }}"
                                    alt="your image" class="h-32 aspect-video object-cover rounded-lg"
                                    onclick="$('#banner').trigger('click')" />
                                @push('scripts')
                                    <script>
                                        banner.onchange = evt => {
                                            preview = document.getElementById('preview2');
                                            preview.style.display = 'block';
                                            const [file] = banner.files
                                            if (file) {
                                                preview.src = URL.createObjectURL(file)
                                            }
                                        }
                                    </script>
                                @endpush
                            </div>
                            <x-input-error :messages="$errors->get('banner')" class="mt-2" />
                        </div>

                        <div class="flex items-center mt-4 gap-4">
                            <x-primary-button>
                                {{ __('Update') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
