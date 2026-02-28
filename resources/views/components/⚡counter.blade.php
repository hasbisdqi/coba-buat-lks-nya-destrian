<?php

use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

new class extends Component {
    use WithFileUploads; // 1MB Max

    #[Validate('image|max:1024')]
    public $photo;
    public $path;

    public function save()
    {
        $this->path = $this->photo->storePublicly(
            path: 'photos',
            options: 'public'
        );
    }
};
?>

<div>
    <form wire:submit="save">
        @if ($photo)
        <img src="{{ $photo->temporaryUrl() }}">
        @endif
        <input type="file" wire:model="photo">

        @error('photo')
        <span class="error">{{ $message }}</span>
        @enderror

        <flux:button type="submit">Save photo</flux:button>
    </form>
    @if ($path)
    <img src="storage/{{ $path }}" alt="">
    @endif
</div>