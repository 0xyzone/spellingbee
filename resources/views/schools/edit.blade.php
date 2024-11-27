<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit School') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 font-bold text-2xl">
                    <form method="POST" action="{{ route('schools.update', $school) }}">
                        @csrf
                        @method('patch')
                        <input type="hidden" name="last_url" value="{{ URL::previous() }}">
                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('School Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name', $school->name)" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('School Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email', $school->email)" required />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Contact Person Name -->
                        <div class="mt-4">
                            <x-input-label for="contact_person_name" :value="__('Contact Person Name')" />
                            <x-text-input id="contact_person_name" class="block mt-1 w-full" type="text"
                                name="contact_person_name" :value="old('contact_person_name', $school->contact_person_name)" required />
                            <x-input-error :messages="$errors->get('contact_person_name')" class="mt-2" />
                        </div>

                        <!-- Contact Person Number -->
                        <div class="mt-4">
                            <x-input-label for="contact_number" :value="__('Contact Person Number')" />
                            <x-text-input id="contact_number" class="block mt-1 w-full" type="number"
                                name="contact_number" :value="old('contact_number', $school->contact_number)" required />
                            <x-input-error :messages="$errors->get('contact_number')" class="mt-2" />
                        </div>

                        <!-- School Address -->
                        <div class="mt-4">
                            <x-input-label for="address" :value="__('School Address')" />
                            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address"
                                :value="old('address', $school->address)" required />
                            <x-input-error :messages="$errors->get('address')" class="mt-2" />
                        </div>

                        {{-- School Type --}}
                        <div class="mt-4">
                            <x-input-label for="school_type" :value="__('School Type')" />
                            <select id="school_type"
                                class="block border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-yellow-500 dark:focus:border-yellow-600 focus:ring-yellow-500 dark:focus:ring-yellow-600 rounded-md shadow-sm mt-1 w-full"
                                type="text" name="school_type" required>
                                <option value="private" @if($school->school_type == "private") @endif>Private</option>
                                <option value="government" @if($school->school_type == "government") selected @endif>Government</option>
                                <option value="community" @if($school->school_type == "community") selected @endif>Community</option>
                            </select>
                            <x-input-error :messages="$errors->get('school_type')" class="mt-2" />
                        </div>

                        <div class="flex items-center mt-4">
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
