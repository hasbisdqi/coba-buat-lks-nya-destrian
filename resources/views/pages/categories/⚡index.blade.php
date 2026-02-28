<?php

use App\Models\Category;
use Livewire\Attributes\Validate;
use Livewire\Component;

new class extends Component {
    public function getCategoriesProperty()
    {
        return Category::all();
    }
};
?>

<div>
    <flux:table>
        <flux:table.columns>
            <flux:table.column>No</flux:table.column>
            <flux:table.column>Name</flux:table.column>
            <flux:table.column>Action</flux:table.column>
        </flux:table.columns>
        <flux:table.rows>
                @foreach ($this->categories as $c)
                <flux:table.row>
                    <flux:table.cell>1</flux:table.cell>
                    <flux:table.cell>{{$c->name}}</flux:table.cell>
                    <flux:table.cell>A</flux:table.cell>
                </flux:table.row>
                @endforeach
            </flux:table.rows>
    </flux:table>
</div>
