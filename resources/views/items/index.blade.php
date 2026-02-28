<?php

use App\Models\Item;
use Livewire\Component;

new class extends Component {
    public ?int $deleteId = null;

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
    }

    public function delete()
    {
        Item::findOrFail($this->deleteId)->delete();

        $this->deleteId = null;
    }
    public function test()
    {
        dd('LIVEWIRE WORK');
    }
};
?>

<x-layouts::app :title="__('Items')">
    <flux:button wire:click="test">
        Test Livewire
    </flux:button>
    <flux:button>
        <a href="{{ route('items.create') }}">Add Item</a>
    </flux:button>
    <flux:table class="px-4">
        <flux:table.columns>
            <flux:table.column>#</flux:table.column>
            <flux:table.column>Name</flux:table.column>
            <flux:table.column>Price</flux:table.column>
            <flux:table.column>Action</flux:table.column>
        </flux:table.columns>

        <flux:table.rows>
            @foreach ($items as $index => $item)
                <flux:table.row>
                    <flux:table.cell>{{ $index + 1 }}</flux:table.cell>
                    <flux:table.cell>
                        <flux:heading>
                            {{ $item->name }}
                        </flux:heading>
                        <flux:text class="mt-2">
                            {{ $item->description }}
                        </flux:text>
                    </flux:table.cell>
                    <flux:table.cell>Rp. {{ number_format($item->price, 0, ',', '.') }}</flux:table.cell>
                    <flux:table.cell>
                        <flux:modal.trigger name="delete-profile">
                            <flux:button icon="trash" variant="danger" wire:click="confirmDelete({{ $item->id }})" />
                        </flux:modal.trigger>
                    </flux:table.cell>
                </flux:table.row>
            @endforeach
        </flux:table.rows>
    </flux:table>

    <flux:modal name="delete-profile" class="min-w-88">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Delete project?</flux:heading>

                <flux:text class="mt-2">
                    You're about to delete this project.<br>
                    This action cannot be reversed.
                </flux:text>
            </div>

            <div class="flex gap-2">
                <flux:spacer />

                <flux:modal.close>
                    <flux:button variant="ghost">Cancel</flux:button>
                </flux:modal.close>
                <flux:button wire:click="delete" variant="danger">Delete project</flux:button>
            </div>
        </div>
    </flux:modal>
</x-layouts::app>
