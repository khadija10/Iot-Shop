<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartComponent extends Component {
    public function increaseQuantity($rowId){
        $product = Cart::get($rowId);

        $quantity = $product->quantity + 1;

        Cart::update($rowId, $quantity);
    }


    public function decreaseQuantity($rowId){
        $product = Cart::get($rowId);

        $quantity = $product->quantity - 1;

        Cart::update($rowId, $quantity);
    }
}