<div class="mr-2 rounded-full overflow-hidden" @updated="$refresh">
    <img src="{{ Storage::url(auth()->user()->avatar->user_avatar_path) }}" alt="" class="h-8 aspect-square">
</div>
