<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class MobileviewComponent extends Component
{
    public function render()
    {
        $categories = Category::select('name', 'slug')->cursor();

        return view('livewire.mobileview-component', compact('categories'));
    }
}
