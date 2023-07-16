<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class WishListComponent extends Component
{
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
        return view('livewire.wish-list-component');
    }
}
