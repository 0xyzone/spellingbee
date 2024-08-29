<section>
    <header>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Orbitron&display=swap');

            .range {
                font-family: 'Orbitron', monospace;

                &:before {
                    --width: calc(var(--p) * 1%);

                    content: '';
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 0;
                    height: 100%;
                    background-color: #c79f00;
                    z-index: 0;
                    animation: load .5s forwards linear, glitch 2s infinite linear;
                }

                &:after {
                    counter-reset: progress var(--p);
                    content: counter(progress) '%';
                    color: #fff;
                    position: absolute;
                    left: 5%;
                    top: 50%;
                    transform: translateY(-50%);
                    z-index: 1;
                }

                &__label {
                    transform: skew(-30deg) translateY(-100%) translateX(50px);
                    line-height: 3;
                }
            }

            @keyframes load {
                to {
                    width: var(--width);
                }
            }
        </style>
        @unless ($user->getPercentageCompleteAttribute() == 100) 
            <div class="range my-6 before:rounded-lg relative bg-gray-700 w-full h-[30px] rounded-lg"
                style="--p:{{ $user->getPercentageCompleteAttribute() }}">
            </div>
        @endunless
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)"
                required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="address" :value="__('Address')" />
            <x-text-input id="address" name="address" type="text" class="mt-1 block w-full" :value="old('address', $user->address)"
                required />
            <x-input-error class="mt-2" :messages="$errors->get('address')" />
        </div>

        <div>
            <x-input-label for="contact_number" :value="__('Contact Number')" />
            <x-text-input id="contact_number" name="contact_number" type="text" class="mt-1 block w-full"
                :value="old('contact_number', $user->contact_number)" required />
            <x-input-error class="mt-2" :messages="$errors->get('contact_number')" />
        </div>

        <div>
            <x-input-label for="date_of_birth" :value="__('Date of Birth')" />
            <x-text-input id="date_of_birth" name="date_of_birth" type="date" class="mt-1 block w-full"
                :value="old('date_of_birth', $user->date_of_birth)" required />
            <x-input-error class="mt-2" :messages="$errors->get('date_of_birth')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)"
                required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"
                            class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        {{-- <div>
            <x-input-label for="school" :value="__('School')" />
            <select name="school" id="school"
                class="block border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-yellow-500 dark:focus:border-yellow-600 focus:ring-yellow-500 dark:focus:ring-yellow-600 rounded-md shadow-sm mt-1 w-full">
                <option value="">Search for your school</option>
                @foreach ($schools as $var)
                <option value="{{ $var->name }}" @if ($user->school == $var->name)
                    selected
                @endif>{{ $var->name }}</option>
                @endforeach
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('school')" />
        </div> --}}

        <div>
            <x-input-label for="school" :value="__('School Name')" />
            <x-text-input id="school" name="school" type="text" class="mt-1 block w-full" :value="old('school', $user->school)"
                required />
            <x-input-error class="mt-2" :messages="$errors->get('school')" />
        </div>

        <div>
            <x-input-label for="gender" :value="__('Gender')" />
            <x-text-input id="school" name="school" type="text" class="mt-1 block w-full" :value="old('school', $user->school)"
                required />

                <select name="gender" id="gender" class="mt-1 block w-full" :value="old('gender', $user->gender)"
                    required >
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            <x-input-error class="mt-2" :messages="$errors->get('school')" />
        </div>

        <script>
            $(document).ready(function() {
                $('select').selectize({
                    sortField: 'text'
                });
            });
        </script>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
