<?php

use App\Livewire\Cart\AddToCartButton;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Livewire\Livewire;

beforeEach(function () {
    Session::flush();
});

it('renders the AddToCartButton component successfully', function () {
    // Arrange
    $product = Product::factory()->active()->create();

    // Act & Assert
    Livewire::test('cart.add-to-cart-button', ['product' => $product])
        ->assertOk()
        ->assertSet('product', $product);
});

it('adds a single product to the cart', function () {
    // Arrange
    $product = Product::factory()->active()->create(['id' => 487]);

    // Act
    Livewire::test(AddToCartButton::class, ['product' => $product])
        ->call('addToCart', $product);

    // Assert
    expect(Session::has('cart'))->toBeTrue();
    $cart = Session::get('cart');
    expect($cart)->toHaveKey('items');
    expect($cart['items'])->toHaveKey($product->id);
    expect($cart['items'][$product->id]['qty'])->toBe(1);
});

it('dispatches the cart.updated event after adding a product to the cart', function () {
    // Arrange
    $product = Product::factory()->active()->create(['id' => 487]);

    // Act & Assert
    Livewire::test(AddToCartButton::class, ['product' => $product])
        ->call('addToCart', $product)
        ->assertDispatched('cartUpdated');
});


// it('increments product quantity if already in the cart', function () {
//     // Arrange
//     $product = Product::factory()->active()->create(['id' => 487]);
//     Session::put('cart', [
//         'items' => [
//             $product->id => [
//                 'name' => $product->name,
//                 'price' => $product->price,
//                 'qty' => 1,
//             ],
//         ],
//     ]);

//     // Act
//     Livewire::test(AddToCartButton::class, ['product' => $product])
//         ->call('addToCart', $product);

//     // Assert
//     $cart = Session::get('cart');
//     expect($cart['items'][$product->id]['qty'])->toBe(2);
// });
