<x-layouts::app :title="__('Items')">
    <flux:heading size="lg">
        Create Item
    </flux:heading>
    <flux:text>
        Create items with this form.
    </flux:text>

    <form action="{{ route('items.store') }}" class="space-y-4 mt-4" method="post">
        @csrf
        <flux:field>
            <flux:label>Name</flux:label>

            <flux:input wire:model="name" type="name" />

            <flux:error name="name" />
        </flux:field>
        <flux:field>
            <flux:label>Description</flux:label>

            <flux:textarea wire:model="description" />

            <flux:error name="description" />
        </flux:field>
        <flux:field>
            <flux:label>Price</flux:label>

            <flux:input wire:model="price" type="number" />

            <flux:error name="price" />
        </flux:field>
        <flux:button type="submit">Create Item</flux:button>
    </form>
</x-layouts::app>
