<?php

namespace App\Http\Controllers\user;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class LandingPageController extends Controller
{
    
    public function index()
    {
        // Fetch the top 4 best-selling products
        $products = Product::select('products.*', DB::raw('SUM(order_items.quantity) as total_sold'))
            ->join('order_items', 'products.id', '=', 'order_items.product_id')
            ->groupBy('products.id')
            ->orderBy('total_sold', 'desc')
            ->take(8)
            ->get();

        // Return a view with products
        return view('user.master', compact('products'));
    }
}
