<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminEditCategoryComponent extends Component
{
    use WithFileUploads;

    public $category_id;
    public $name;
    public $slug;
    public $image;
    public $is_popular;
    public $newImage;

    public function mount($category_id)
    {
        $category = Category::find($category_id);
        $this->category_id = $category->id;
        $this->name = $category->name;
        $this->slug = $category->slug;
        $this->image = $category->image;
        $this->is_popular = $category->is_popular;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required'
        ]);
    }

    public function updateCategory()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'is_popular' => 'required',
            'newImage' => 'required|image'
        ]);

        $category = Category::find($this->category_id);
        if (!$category) {
            return;
        }
        $imageName = '';
        if ($this->newImage) {
            $imageName = Carbon::now()->timestamp . '.' . $this->newImage->extension();

            // Check if file exists before deleting
            $existingImagePath = 'assets/imgs/category/' . $category->image;
            if (file_exists($existingImagePath)) {
                unlink($existingImagePath);
            }

            // Use Storage facade to store file
             $this->newImage->storeAs('category', $imageName);
        }
        $category->update([
            'name' => $this->name,
            'slug' => $this->slug,
            'image' => $imageName
        ]);
        session()->flash('message', 'Category Updated');

    }

    public function render()
    {
        return view('livewire.admin.admin-edit-category-component');
    }
}
