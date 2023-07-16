<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminAddCategoryComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $slug;
    public $image;
    public $is_popular = 0;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required',
            'image' => 'required',
        ]);
    }

    public function storeCategory()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'image' => 'required',
        ]);

        $imageName = Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('category', $imageName);

        Category::create([
            'name' => $this->name,
            'slug' => $this->slug,
            'image' => $imageName,
            'is_popular' => $this->is_popular
        ]);
        session()->flash('message', 'Category Created');
    }

    public function render()
    {
        return view('livewire.admin.admin-add-category-component');
    }
}
