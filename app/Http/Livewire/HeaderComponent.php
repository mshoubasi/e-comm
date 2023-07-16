<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class HeaderComponent extends Component
{
    public function render()
    {
        $categories = Category::select('name', 'slug')->cursor();

        return view('livewire.header-component', compact('categories'));
    }
}
