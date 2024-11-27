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
        <div class="range my-6 before:rounded-lg relative bg-gray-700 w-full h-[30px] rounded-lg" style="--p:{{ $user->getPercentageCompleteAttribute() }}">
        </div>
        @endunless
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Contestant No. ') . auth()->user()->id }}
        </h2>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <fieldset class="border rounded-lg border-white px-4 py-4 pb-5 gap-4 flex flex-col">
            <legend class="px-2 text-white">Personal Detail</legend>
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            <div>
                <x-input-label for="gender" :value="__('Gender')" />
                <select name="gender" id="gender" class="mt-1 block w-full rounded-lg">
                    <option value="male" @if($user->gender == "male") selected @endif>Male</option>
                    <option value="female" @if($user->gender == "female") selected @endif>Female</option>
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('gender')" />
            </div>

            <div>
                <x-input-label for="address" :value="__('Address')" />
                <x-text-input id="address" name="address" type="text" class="mt-1 block w-full" :value="old('address', $user->address)" required />
                <x-input-error class="mt-2" :messages="$errors->get('address')" />
            </div>

            <div>
                <x-input-label for="contact_number" :value="__('Contact Number')" />
                <x-text-input id="contact_number" name="contact_number" type="number" class="mt-1 block w-full" :value="old('contact_number', $user->contact_number)" required />
                <x-input-error class="mt-2" :messages="$errors->get('contact_number')" />
            </div>

            <div>
                <x-input-label for="date_of_birth" :value="__('Date of Birth')" />
                <x-text-input id="date_of_birth" name="date_of_birth" type="date" class="mt-1 block w-full" :value="old('date_of_birth', $user->date_of_birth)" required />
                <x-input-error class="mt-2" :messages="$errors->get('date_of_birth')" />
            </div>

            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
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
        </fieldset>
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

        <fieldset class="border rounded-lg border-white px-4 py-4 pb-5">
            <legend class="px-2 text-white">School Detail</legend>
            <div>
                <x-input-label for="school" :value="__('School Name')" />
                <x-text-input id="school" name="school" type="text" class="mt-1 block w-full" :value="old('school', $user->school)" required />
                <x-input-error class="mt-2" :messages="$errors->get('school')" />
            </div>
            <div class="mt-4">
                <x-input-label for="school_address" :value="__('School Address')" />
                <x-text-input id="school_address" name="school_address" type="text" class="mt-1 block w-full" :value="old('school_address', $user->school_address)" required />
                <x-input-error class="mt-2" :messages="$errors->get('school_address')" />
            </div>
            <div class="mt-4">
                <x-input-label for="school_email" :value="__('School Email')" />
                <x-text-input id="school_email" name="school_email" type="email" class="mt-1 block w-full" :value="old('school_email', $user->school_email)" required />
                <x-input-error class="mt-2" :messages="$errors->get('school_email')" />
            </div>
            <div class="mt-4">
                <x-input-label for="school_number" :value="__('School Number')" />
                <x-text-input id="school_number" name="school_number" type="number" class="mt-1 block w-full" :value="old('school_number', $user->school_number)" required />
                <x-input-error class="mt-2" :messages="$errors->get('school_number')" />
            </div>
            <div class="mt-4">
                <x-input-label for="grade" :value="__('Grade')" />
                <x-text-input id="grade" name="grade" type="number" class="mt-1 block w-full" :value="old('grade', $user->grade)" required />
                <x-input-error class="mt-2" :messages="$errors->get('grade')" />
            </div>
        </fieldset>


        <fieldset class="border rounded-lg border-white px-4 py-4 pb-5">
            <legend class="px-2 text-white">Representative Detail</legend>

            <div>
                <x-input-label for="representative_name" :value="__('Name')" />
                <x-text-input id="representative_name" name="representative_name" type="text" class="mt-1 block w-full" :value="old('representative_name', $user->representative_name)" />
                <x-input-error class="mb-2" :messages="$errors->get('representative_name')" />
            </div>

            <div class="mt-4">
                <x-input-label for="representative_number" :value="__('Contact Number')" />
                <x-text-input id="representative_number" name="representative_number" type="number" class="mt-1 block w-full" :value="old('representative_number', $user->representative_number)" />
                <x-input-error class="mb-2" :messages="$errors->get('representative_number')" />
            </div>

            <div class="mt-4">
                <x-input-label :value="__('Relationship')" />
                <div class="flex gap-4 mt-1 text-white">
                    <div class="flex gap-2">
                        <input id="father" name="representative_relationship" type="radio" class="mt-1 text-amber-500" value="father" @if($user->representative_relationship == "father") checked @endif />
                        <label for="father">Father</label>
                    </div>
                    <div class="flex gap-2">
                        <input id="Mother" name="representative_relationship" type="radio" class="mt-1 text-amber-500" value="mother" @if($user->representative_relationship == "mother") checked @endif />
                        <label for="Mother">Mother</label>
                    </div>
                    <div class="flex gap-2">
                        <input id="Guardian" name="representative_relationship" type="radio" class="mt-1 text-amber-500" value="guardian" @if($user->representative_relationship == "guardian") checked @endif />
                        <label for="Guardian">Guardian</label>
                    </div>
                    <div class="flex gap-2">
                        <input id="teacher" name="representative_relationship" type="radio" class="mt-1 text-amber-500" value="teacher" @if($user->representative_relationship == "teacher") checked @endif />
                        <label for="teacher">Teacher</label>
                    </div>
                </div>
                <x-input-error class="mb-2" :messages="$errors->get('representative_relationship')" />
            </div>
        </fieldset>

        <script>
            $(document).ready(function() {
                $('select').selectize({
                    sortField: 'text'
                });
            });

        </script>

        <div>
            <div class="flex gap-2">
                <input type="checkbox" name="consent" id="consent" class="text-amber-500" @if($user->consent == "on") checked @endif>
                <x-input-label for="consent">I hereby declare all the information above is correct and take full responsibility for it.</x-input-label>
            </div>
            <x-input-error class="mt-2" :messages="$errors->get('consent')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
