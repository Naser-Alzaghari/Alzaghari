<?php

namespace App\Http\View\Composers;

use App\Models\Category;
use Illuminate\View\View;
use App\Models\Product;

class CartComposer
{
    public function compose(View $view)
    {
        $cart = session()->get('cart', []);
        $cartItemCount = array_sum(array_column($cart, 'quantity'));
        $categories = Category::all();

        // Fetch product details based on product IDs in the cart
        $productIds = array_keys($cart);
        $products = Product::whereIn('id', $productIds)->get();

        // Combine products with their quantities from the cart
        $cartItems = $products->map(function ($product) use ($cart) {
            return [
                'product' => $product,
                'quantity' => $cart[$product->id]['quantity'],
            ];
        });

        $view->with([
            'cartItemCount' => $cartItemCount,
            'cartItems' => $cartItems,
            'categories' => $categories,
        ]);
    }
}
