<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CartComponent extends Component
{
    /**
     * Summary of increaseQuantity
     * @param mixed $rowId
     * @return void
     */
    public function increaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->emitTo('cart-icon-component', 'refreshcomponent');
    }
    /**
     * Summary of decreaseQuantity
     * @param mixed $rowId
     * @return void
     */
    public function decreaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->emitTo('cart-icon-component', 'refreshcomponent');

    }

    /**
     * Summary of destroy
     * @param mixed $id
     * @return void
     */
    public function destroy($id)
    {
        Cart::instance('cart')->remove($id);
        session()->flash('success_message', 'Item has been removed');
        $this->emitTo('cart-icon-component', 'refreshcomponent');

    }

    public function clearAll()
    {
        Cart::instance('cart')->destroy();
        $this->emitTo('cart-icon-component', 'refreshcomponent');

    }
    /**
     * Summary of render
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.cart-component');
    }
}
