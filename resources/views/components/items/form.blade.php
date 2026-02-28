    <flux:modal name="form-item" class="w-xl" wire:model.self="showFormModal" @close="resetForm">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Create Item</flux:heading>

                <flux:text class="mt-2">
                    Fill this form
                </flux:text>
            </div>

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

            <div class="flex gap-2">
                <flux:spacer />

                <flux:modal.close>
                    <flux:button variant="ghost">Cancel</flux:button>
                </flux:modal.close>
                <flux:button wire:click="save">{{ $this->editId ? 'Edit' : 'Create Item' }}</flux:button>
            </div>
        </div>
    </flux:modal>
