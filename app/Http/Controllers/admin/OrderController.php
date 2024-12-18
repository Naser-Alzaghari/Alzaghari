<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Display a listing of users
    public function index()
    {
        $orders = Order::all();
        

    //     $order = Order::with('category')->findOrFail($id);

    // // Access the category name
    // $categoryName = $order->category->name;
        return view('admin.orders.index', compact('orders'));
    }

    // Show the form for creating a new user
    public function create()
    {
        $states = ['pending', 'shipped', 'delivered', 'cancelled'];
        $payment_status = ['paid', 'unpaid'];
        return view('admin.orders.create', compact('states','payment_status'));
    }

    // Store a newly created user in the database
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|numeric', // Ensure the user exists in the `users` table
            'status' => 'required', // Match predefined statuses
            'total_amount' => 'required|numeric|min:0', // Must be numeric and not negative
            'payment_status' => 'required|in:paid,unpaid,refunded', // Match predefined payment statuses
            'address' => 'required|string|max:255', // Required, string, max 255 characters
            'phone_number' => 'required|string|regex:/^\+?[0-9]{7,15}$/', // Validate phone number format
        ]);
        
        Order::create([
            'user_id' => $request->user_id,
            'status' => $request->status,
            'total_amount' => $request->total_amount,
            'payment_status' => $request->payment_status,
            'pickup_date' => $request->pickup_date,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'order_notes' => $request->order_notes,
        ]);

        
        return redirect()->route('admin.orders')->with('success', 'Order created successfully.');
    }

    // Display the specified user
    public function show(Order $order)
    {
        $order = Order::with('orderItems')->findOrFail($order->id);
        return view('admin.orders.show', compact('order'));
    }

    // Show the form for editing the specified Order
    public function edit(Order $order)
    {
        $states = ['pending', 'shipped', 'delivered', 'cancelled'];
        $payment_status = ['paid', 'unpaid'];
        return view('admin.orders.create', compact('order','states','payment_status'));
    }

    // Update the specified user in the database
    public function update(Request $request, Order $order)
    {
        
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'description' => 'required|string|max:255',
        //     'stock' => 'required',
        //     'category_id' => 'required',
        //     'price' => 'required',
        // ]);


        $order->status = $request->status;
        $order->payment_status = $request->payment_status;
        $order->total_amount_after_discount = $request->total_amount_after_discount;
        $order->save();

        return redirect()->route('admin.orders')->with('success', 'Order updated successfully.');
    }

    // Remove the specified user from the database
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete(); // Soft delete
        return redirect()->route('admin.orders')->with('success', 'Order soft-deleted successfully!');
    }

//     public function restore($id)
// {
//     $order = User::onlyTrashed()->findOrFail($id);
//     $order->restore(); // Restore the user
//     return redirect()->route('users.trashed')->with('success', 'User restored successfully!');
// }
}
