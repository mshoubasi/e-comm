<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Gloudemans\Shoppingcart\Facades\Cart;

class DetailsComponent extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::add($product_id, $product_name, 1, $product_price)->associate(Product::class);
        session()->flash('success_message', 'Item added to cart');
        return redirect()->route('shop.cart');
    }
    public function render()
    {
        $product = Product::where('slug', $this->slug)->first();
        $related_products = Product::where('category_id', $product->category_id)->inRandomOrder()->limit(4)->get();
        $new_product = Product::latest()->take(4)->get();
        $categories = Category::orderBy('name', 'ASC')->select('name', 'slug')->cursor();

        return view('livewire.details-component', compact('product', 'related_products', 'new_product', 'categories'));
    }
}
