<div>
    <flux:modal name="delete-item" class="min-w-88" wire:model.self="showConfirmModal">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Delete item?</flux:heading>

                <flux:text class="mt-2">
                    You're about to delete this item.<br>
                    This action cannot be reversed.
                </flux:text>
            </div>

            <div class="flex gap-2">
                <flux:spacer />

                <flux:modal.close>
                    <flux:button variant="ghost">Cancel</flux:button>
                </flux:modal.close>
                <flux:button wire:click="delete" variant="danger">Delete item</flux:button>
            </div>
        </div>
    </flux:modal>
</div>