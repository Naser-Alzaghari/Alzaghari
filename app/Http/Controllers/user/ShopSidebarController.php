<?php

namespace App\Http\Controllers\user;

use App\Models\Color;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

use function Laravel\Prompts\search;

class ShopSidebarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    // Fetch price range from the request, default to '0-0'
    $priceRange = $request->input('price_range', '0-0');
    [$minPrice, $maxPrice] = explode('-', $priceRange);

    // Fetch sorting criteria from the request, default to 'default'
    $sort = $request->input('sort', 'default');

    // Base query
    $query = Product::query();

    // Apply price filtering
    if ($minPrice != 0 || $maxPrice != 0) {
        $query->where(function ($query) use ($minPrice, $maxPrice) {
            $query->whereBetween('price', [(float)$minPrice, (float)$maxPrice])
                ->orWhere(function ($query) use ($minPrice, $maxPrice) {
                    $query->whereNotNull('price_after_discount')
                          ->whereBetween('price_after_discount', [(float)$minPrice, (float)$maxPrice]);
                });
        });
    }

    // Apply sorting
    switch ($sort) {
        case 'rating':
            $query->orderBy('average_rating', 'desc');
            break;
        case 'newness':
            $query->orderBy('created_at', 'desc');
            break;
        case 'price_low_high':
            $query->orderBy('price', 'asc');
            break;
        case 'price_high_low':
            $query->orderBy('price', 'desc');
            break;
        default:
            $query->orderBy('id', 'asc'); // Default sorting
    }

    // Fetch products
    $products = $query->get();

    // Fetch additional data for the view
    $colors = Color::all();
    $categories = Category::all();

    // Return the view with data
    return view('user.shop-sidebar', compact('products', 'colors', 'categories', 'priceRange', 'sort'));
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
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function search_product(Request $request)
    {
        $search = $request->input('search');
        $products = Product::where('name', 'LIKE', "%{$search}%")
        ->orWhere('description', 'LIKE', "%{$search}%")
        ->get();

        $colors = Color::all();
        $categories = Category::all();
        // Return a view with products
        return view('user.shop-sidebar', compact('products','colors','categories'));

    }
    
    public function filterByCategory($id)
    {
        // Fetch products belonging to the selected category
        $products = Product::where('category_id', $id)->get();

        // Fetch all categories to display in the sidebar
        $categories = Category::all();

        // Fetch all colors (if required in the sidebar)
        $colors = Color::all();

        // Get the current category
        $currentCategory = Category::find($id);

        // Return the shop sidebar view with filtered products
        return view('user.shop-sidebar', compact('products', 'categories', 'colors', 'currentCategory'));
    }
}

