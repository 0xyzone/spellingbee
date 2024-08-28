<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\UserAvatar;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;

class UpdateAvatar extends Component
{
    use WithFileUploads;

    public $file;

    public function save()
    {
        // Validate file upload
        $this->validate([
            'file' => 'image', // Assuming maximum file size is 1MB
        ]);

        // Store the uploaded file
        $filePath = $this->file->store('avatars', 'public');

        // Get the current user's avatar, if any
        $currentAvatar = auth()->user()->avatar;

        // Check if the user has an existing avatar record
        $avatar = UserAvatar::where('user_id', auth()->id())->first();

        if ($avatar) {
            // Update the existing avatar record
            $avatar->update(['user_avatar_path' => $filePath]);
        } else {
            // Create a new avatar record
            UserAvatar::create([
                'user_id' => auth()->id(),
                'user_avatar_path' => $filePath
            ]);
        }

        // Delete the old avatar file if exists
        if ($currentAvatar) {
            \Storage::disk('public')->delete($currentAvatar->user_avatar_path);
        }

        session()->flash('status', 'avatar-updated');

        // Refresh the component to update the UI
        $this->reset('file');
        // Refresh the component to update the UI
        $this->dispatch('updated');
    }

    #[On('updated')]
    public function refresh()
    {
    }
    public function render()
    {
        return view('livewire.update-avatar');
    }

    public function previewFile()
    {
        // No need for JavaScript, Livewire will update the preview automatically
    }

    public function removeImage()
    {
        $this->reset('file');
    }
}
