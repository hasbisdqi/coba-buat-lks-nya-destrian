<?php

use App\Models\Item;
use Livewire\Attributes\Validate;
use Livewire\Component;

new class extends Component {
    public ?int $deleteId = null;
    public $showConfirmModal = false;
    public ?int $editId = null;
    public $showFormModal = false;

    #[Validate('required')]
    public $name = '';
    #[Validate('required')]
    public $description = '';
    #[Validate('required')]
    public $price = '';

    public function getItemsProperty()
    {
        return Item::latest()->get();
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
    }

    public function save()
    {
        $this->validate();

        if ($this->editId) {
            Item::findOrFail($this->editId)->update([
                'name' => $this->name,
                'description' => $this->description,
                'price' => $this->price,
            ]);
        } else {
            Item::create([
                'name' => $this->name,
                'description' => $this->description,
                'price' => $this->price,
            ]);
        }

        $this->resetForm();

        $this->showFormModal = false;
    }
    public function edit($id)
    {
        $item = Item::findOrFail($id);

        $this->editId = $item->id;
        $this->name = $item->name;
        $this->description = $item->description;
        $this->price = $item->price;

        $this->showFormModal = true;
    }
    public function delete()
    {
        Item::findOrFail($this->deleteId)->delete();
        $this->showConfirmModal = false;
        $this->deleteId = null;
    }

    public function resetForm()
    {
        $this->reset(['name', 'description', 'price', 'editId']);
    }
};
?>

<div>
    <flux:modal.trigger name="form-item">
        <flux:button>
            Create Item
        </flux:button>
    </flux:modal.trigger>
    <x-items.form/>
    <flux:table class="px-4">
        <flux:table.columns>
            <flux:table.column>#</flux:table.column>
            <flux:table.column>Name</flux:table.column>
            <flux:table.column>Price</flux:table.column>
            <flux:table.column>Action</flux:table.column>
        </flux:table.columns>

        <flux:table.rows>
            @foreach ($this->items as $index => $item)
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
                        <flux:modal.trigger name="form-item">
                            <flux:button icon="pencil" wire:click="edit({{ $item->id }})" />
                        </flux:modal.trigger>
                        <flux:modal.trigger name="delete-item">
                            <flux:button icon="trash" variant="danger"
                                wire:click="confirmDelete({{ $item->id }})" />
                        </flux:modal.trigger>
                    </flux:table.cell>
                </flux:table.row>
            @endforeach
        </flux:table.rows>
    </flux:table>

    <x-items.delete />
</div>
