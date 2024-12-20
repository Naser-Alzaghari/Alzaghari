<?php

namespace App\Http\Controllers\user;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get the authenticated user
        $user = auth()->user();
        
        // Retrieve the orders for the logged-in user
        $orders = $user->orders()->orderBy('id', 'desc')->get();
        
        return view('user.my-orders', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Fetch the order using the provided ID
        $order = Order::with('orderItems')->findOrFail($id);

        // Return the view with order details
        return view('user.show-order', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // Validate the input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . auth()->id(),
            // 'cur_pass' => 'nullable|string',
            // 'new_pass' => 'nullable|string|min:8|confirmed',
            'phone_number' => 'nullable|string|max:14',
            'address' => 'nullable|string|max:255',
        ]);
        // Get the authenticated user
        $user = auth()->user();
        
        
        // Update user information
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone_number = $request->input('phone_number');
        $user->address = $request->input('address');


        $user->address = $request->input('address');
        $user->phone_number = $request->input('phone_number');
        
        // Update password if provided
        if ($request->filled('cur_pass') && Hash::check($request->input('cur_pass'), $user->password)) {
            $user->password = Hash::make($request->input('new_pass'));
        }

        // Save the user
        $user->save();

        // Redirect back with a success message
        return redirect()->back()->with('status', 'Profile updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}


