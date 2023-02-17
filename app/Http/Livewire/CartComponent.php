<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;

class CartComponent extends Component
{
    public $productId;
    public $productName;
    public $productPrice;
    public $quantity = 1;

    public function addToCart()
    {
        if (!auth()->check()) {
            session()->flash('error', 'You need to login to add a product to the cart.');
            return;
        }
        $cart = Session::get('cart', []);
        $cart[$this->productId] = [
            'name' => $this->productName,
            'price' => $this->productPrice,
            'quantity' => $this->quantity,
        ];
        session::put('cart', $cart);
        session()->flash('success', 'Product added to cart successfully.');
    }
    public function render()
    {
        return view('livewire.cart-component');
    }
}