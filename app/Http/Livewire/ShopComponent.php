<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;
use Livewire\WithPagination;

class ShopComponent extends Component
{
    use WithPagination;

    public $pageSize = 12;

    public $orderBy = 'Default Sorting';

    public $min_value = 0;

    public $max_value = 1000;

    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate(Product::class);
        session()->flash('success_message', 'Item added to cart');
        $this->emitTo('cart-icon-component', 'refreshcomponent');
        return redirect()->route('shop.cart');
    }

    public function changePageSize($size)
    {
        $this->pageSize = $size;
    }

    public function changeOrderBy($order)
    {
        $this->orderBy = $order;
    }

    public function addToWishList($product_id, $product_name, $product_price)
    {
        Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price)->associate(Product::class);
        $this->emitTo('wishlist-icon-component', 'refreshcomponent');
    }

    public function removeFromWishList($product_id)
    {
        foreach(Cart::instance('wishlist')->content() as $wishlist_item)
        {
            if ($wishlist_item->id == $product_id) {
                Cart::instance('wishlist')->remove($wishlist_item->rowId);
                $this->emitTo('wishlist-icon-component', 'refreshcomponent');
                return;
            }
        }
    }

    public function render()
    {
        if ($this->orderBy == 'Price: Low to High') {
            $products = Product::whereBetween('regular_price', [$this->min_value, $this->max_value])->orderBy('regular_price', 'ASC')->paginate($this->pageSize);
        } else if ($this->orderBy == 'Price: High to Low') {
            $products = Product::whereBetween('regular_price', [$this->min_value, $this->max_value])->orderBy('regular_price', 'DESC')->paginate($this->pageSize);
        } else if ($this->orderBy == 'Sort By Newest') {
            $products = Product::whereBetween('regular_price', [$this->min_value, $this->max_value])->orderBy('created_at', 'DESC')->paginate($this->pageSize);
        } else {
            $products = Product::whereBetween('regular_price', [$this->min_value, $this->max_value])->paginate($this->pageSize);
        }
        $categories = Category::orderBy('name', 'ASC')->get();
        return view('livewire.shop-component', ['products' => $products, 'categories' => $categories]);
    }
}
