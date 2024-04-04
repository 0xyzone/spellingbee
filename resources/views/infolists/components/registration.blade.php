<x-dynamic-component :component="$getEntryWrapperView()" :entry="$entry">
    <div class="flex flex-col">
        <i class="fas fa-user"></i><p>{{ $getRecord()->user->name }}</p>
        <p>{{ $getRecord()->user->address }}</p>
    </div>
</x-dynamic-component>
