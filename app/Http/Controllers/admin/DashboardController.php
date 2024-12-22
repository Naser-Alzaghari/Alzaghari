<?php

namespace App\Http\Controllers\admin;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Visit;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch data for the dashboard
        $subscribers = User::count(); // Total visitors
        $orders = Order::count(); // Total orders
        $totalSales = Order::select(DB::raw("SUM(COALESCE(total_amount_after_discount, total_amount)) AS sales")
        )->pluck('sales')
        ->first();
        

        $salesData = Order::select(
            DB::raw("SUM(COALESCE(total_amount_after_discount, total_amount)) AS sales"),
            DB::raw("MONTH(created_at) as month")
        )
        ->groupBy('month')
        ->orderBy('month')
        ->pluck('sales', 'month')
        ->all();
        // dd($salesData);
        
        // Format data for the chart
        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        $sales = [];
        
        for ($i = 1; $i <= 12; $i++) {
            $sales[] = $salesData[$i] ?? 0; // Fill missing months with 0
        }

        $visitCount = Visit::first()->count ?? 0;

        


        // Pass data to the dashboard view
        return view('admin.dashboard', compact('totalSales','subscribers', 'orders', 'sales', 'months', 'visitCount'));
    }


    

}
