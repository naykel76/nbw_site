<?php

namespace App\Livewire\Cart;

use App\Models\Product;
use Livewire\Component;

class AddToCartButton extends Component
{
    public Product $product;
    public int $qty = 1;

    public function addToCart()
    {
        cart()->add((int) $this->product->id, $this->qty);
        $this->dispatch('cartUpdated');
    }

    public function render()
    {
        return view('livewire.cart.add-to-cart-button');
    }
}
