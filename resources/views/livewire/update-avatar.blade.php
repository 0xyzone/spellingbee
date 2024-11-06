<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Update Avatar') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Upload a profile picture that shows your face clearly. Best if you get it from a studio.') }}
        </p>
    </header>

    <form wire:submit="save" class="mt-6 space-y-6" enctype="multipart/form-data" @updated="$refresh">
        <div class="flex gap-4">
            @if(!$file && !auth()->user()->avatar)
            <label for="file" class="block !w-max">
                <div class="w-32 lg:w-64 aspect-square p-8 border-dashed border rounded-2xl cursor-pointer shrink-0" id="upload">
                    <img src="{{ asset('img/upload.png') }}" alt="upload" id="uploadPreview">
                </div>
            </label>
            @endif
            @if(auth()->user()->avatar)
            <div>
                <label for="file" class="block !w-max">
                    <div class="w-32 lg:w-64 aspect-square object-cover shrink-0 rounded-2xl cursor-pointer overflow-hidden">
                        <img src="{{ Storage::url(auth()->user()->avatar->user_avatar_path) }}" alt="{{ auth()->user()->name }}'s Avatar">
                    </div>
                </label>
                @if (!$file)
                <p class="text-white pt-6"><i class="fas fa-info-circle pr-2"></i> If you want to change your avatar then simply click on it.</p>
                @endif
            </div>
            @endif

            <div class="relative shrink-0">
                @if($file)
                <img src="{{ $file->temporaryUrl() }}" alt="Image Preview" class="w-32 lg:w-64 aspect-square object-cover shrink-0 rounded-2xl">
                <button wire:click="removeImage" class="absolute top-2 right-2 bg-red-500 rounded-full px-1"><i class="far fa-circle-xmark text-white"></i></button>
                @endif
            </div>
            <input type="file" id="file" wire:model.live="file" wire:change="previewFile" hidden wire:ref="fileInput">
        </div>

        <div class="flex items-center gap-4">
            @if ($file)
            <x-primary-button>{{ __('Save') }}</x-primary-button>
            @endif
            @if (session('status') === 'avatar-updated')
            <p x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600 dark:text-gray-400">{{ __('Avatar Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
