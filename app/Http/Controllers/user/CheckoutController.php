<?php

namespace App\Http\Controllers\user;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index(Request $request){
        // Retrieve cart data from session
        $cart = session()->get('cart', []);

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

        $total = $this->calculateTotal($cart);
        return view('user.checkout', compact('cart', 'cartItems' , 'total'));
    }

    private function calculateTotal($cart)
    {
        $total = 0;
        foreach ($cart as $item) {
            $product = Product::find($item['product_id']);
            $total += ($product->price_after_discount ?? $product->price) * $item['quantity'];
        }
        return number_format($total, 2);
    }

    public function placeOrder(Request $request){
        $paymentMethod = $request->input('payment-method'); // Payment method
        $cartItems = $request->input('cartItems');          // Cart items
        $total = $request->input('total');                 // Total amount
        // Validate the input
        $request->validate([
            'payment-method' => 'required|string',
            'address' => 'required|string',
            'phone_number' => 'required|string',
            'cartItems' => 'required|array',
            'cartItems.*.product_id' => 'required|integer',
            'cartItems.*.quantity' => 'required|integer|min:1',
            'cartItems.*.price' => 'required|numeric|min:0',
            'total' => 'required|numeric|min:0',
        ]);
        
        // Start a database transaction
        DB::beginTransaction();
        
        try {
            // Step 1: Create the order
            $order = new \App\Models\Order();
            $order->user_id = auth()->id();                  // Assuming user authentication
            $order->status = 'pending';                     // Initial order status
            $order->total_amount = $total;                  // Total amount
            $order->total_amount_after_discount = $total;   // Adjust this if discounts are applied
            $order->payment_status = 'unpaid';              // Initial payment status
            $order->pickup_date = null;                     // Set if applicable
            $order->address = $request->input('address');
            $order->phone_number = $request->input('phone_number');
            $order->order_notes = $request->input('order_notes');
            $order->save();
            
            // Step 2: Insert items into order_items and check stock
            foreach ($cartItems as $item) {
                $product = \App\Models\Product::find($item['product_id']);
                if ($product->stock < $item['quantity']) {
                    throw new \Exception('Insufficient stock for product: ' . $product->name);
                }
                
                // Subtract the quantity from the product stock
                $product->stock -= $item['quantity'];
                $product->save();
    
                $orderItem = new \App\Models\OrderItem();
                $orderItem->order_id = $order->id;           // Link to the created order
                $orderItem->product_id = $item['product_id'];
                $orderItem->quantity = $item['quantity'];
                $orderItem->price = $item['price'];
                $orderItem->save();
            }
    
            // Step 3: Clear the cart session
            $request->session()->forget('cart'); // Remove the cart from the session
    
            // Commit the transaction
            DB::commit();
            
            return view('user.thank-you');
            // return response()->json(['message' => 'Order placed successfully!']);
        } catch (\Exception $e) {
            // Rollback in case of failure
            DB::rollBack();
    
            return response()->json([
                'message' => 'Failed to place order.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    
}


