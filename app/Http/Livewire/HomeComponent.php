<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use App\Models\HomeSlider;
use Gloudemans\Shoppingcart\Facades\Cart;

class HomeComponent extends Component
{
    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate(Product::class);
        session()->flash('success_message', 'Item added to cart');
        $this->emitTo('cart-icon-component', 'refreshcomponent');
        return redirect()->route('shop.cart');
    }

    public function render()
    {
        $slides = HomeSlider::where('status', 1)->get();
        $featured_products = Product::where('featured', 1)->inRandomOrder()->get()->take(8);
        $popular_categories = Category::where('is_popular', 1)->inRandomOrder()->get()->take(8);
        $latest_products = $this->getLatestProducts(8);
        return view('livewire.home-component', compact(
            'slides',
            'latest_products',
            'featured_products',
            'popular_categories',
        ));
    }

    private function getLatestProducts($limit)
    {
        return Product::with('category')
            ->orderBy('created_at', 'DESC')
            ->take($limit)
            ->get();
    }
}
