<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminEditProductComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $sku;
    public $stock_status = 'instock';
    public $featured = 0;
    public $quantity;
    public $image;
    public $category_id;
    public $product_id;
    public $new_image;

    public function mount($product_id)
    {
        $product = Product::find($product_id);
        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->short_description = $product->short_description;
        $this->description = $product->description;
        $this->regular_price = $product->regular_price;
        $this->sale_price = $product->sale_price;
        $this->sku = $product->sku;
        $this->stock_status = $product->stock_status;
        $this->featured = $product->featured;
        $this->quantity = $product->quantity;
        $this->image = $product->image;
        $this->category_id = $product->category_id;
        $this->product_id = $product->id;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    // public function updateProduct()
    // {
    //     $this->validate([
    //         'slug' => 'required',
    //         'short_description' => 'required',
    //         'description' => 'required',
    //         'regular_price' => 'required',
    //         'name' => 'required',
    //         'sale_price' => 'required',
    //         'sku' => 'required',
    //         'stock_status' => 'required',
    //         'featured' => 'required',
    //         'quantity' => 'required',
    //         'new_image' => 'required|image',
    //         'category_id' => 'required',
    //     ]);
    //     $product = Product::find($this->product_id);
    //     $imageName = '';
    //     if ($this->new_image) {
    //         unlink('assets/imgs/products/' . $product->image);
    //         $imageName = Carbon::now()->timestamp . '.' . $this->new_image->extension();
    //         $this->image->storeAs('products', $imageName);
    //     }
    //     $product->update([
    //         'name' => $this->name,
    //         'slug' => $this->slug,
    //         'short_description' => $this->short_description,
    //         'description' => $this->description,
    //         'regular_price' => $this->regular_price,
    //         'sale_price' => $this->sale_price,
    //         'sku' => $this->sku,
    //         'stock_status' => $this->stock_status,
    //         'featured' => $this->featured,
    //         'quantity' => $this->quantity,
    //         'new_image' => $imageName,
    //         'category_id' => $this->category_id,
    //     ]);
    //     session()->flash('message', 'Product Updated');
    // }
    public function updateProduct()
    {
        $this->validate([
            'slug' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'regular_price' => 'required',
            'name' => 'required',
            'sale_price' => 'required',
            'sku' => 'required',
            'stock_status' => 'required',
            'featured' => 'required',
            'quantity' => 'required',
            'new_image' => 'nullable|image',
            'category_id' => 'required',
        ]);

        $product = Product::find($this->product_id);

        if (!$product) {
            return; // Or throw an error
        }

        $imageName = '';

        // if ($this->new_image) {
        //     unlink('assets/imgs/products/' . $product->image);
        //     $imageName = Carbon::now()->timestamp . '.' . $this->new_image->extension();
        //     $this->new_image->storeAs('products', $imageName);
        // }

        if ($this->new_image) {
            $imageName = Carbon::now()->timestamp . '.' . $this->new_image->extension();

            // Check if file exists before deleting
            $existingImagePath = 'assets/imgs/products/' . $product->image;
            if (file_exists($existingImagePath)) {
                unlink($existingImagePath);
            }

            // Use Storage facade to store file
             $this->new_image->storeAs('products', $imageName);
        }


        $product->update([
            'name' => $this->name,
            'slug' => $this->slug,
            'short_description' => $this->short_description,
            'description' => $this->description,
            'regular_price' => $this->regular_price,
            'sale_price' => $this->sale_price,
            'sku' => $this->sku,
            'stock_status' => $this->stock_status,
            'featured' => $this->featured,
            'quantity' => $this->quantity,
            'image' => $imageName ?: $product->image, // Use existing image if no new one was uploaded
            'category_id' => $this->category_id,
        ]);

        session()->flash('message', 'Product Updated');
    }

    public function render()
    {
        $categories = Category::orderBy('created_at', 'ASC')->get();
        return view('livewire.admin.admin-edit-product-component', ['categories' => $categories]);
    }
}
