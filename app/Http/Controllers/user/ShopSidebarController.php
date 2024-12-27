<?php

namespace App\Http\Controllers\user;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

use function Laravel\Prompts\search;

class ShopSidebarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $previousPath = parse_url(url()->previous(), PHP_URL_PATH);
    if(preg_match('/\/shop\/category\/(\d+)/', $previousPath, $matches)){
        $categoryId = $matches[1];
    }

    $priceRange = $request->input('price_range', '0-0');
    [$minPrice, $maxPrice] = explode('-', $priceRange);

    $sort = $request->input('sort', 'default');
    $query = Product::query();
    if(isset($categoryId)){
        $query->where('category_id', $categoryId);
    }

    if ($minPrice != 0 || $maxPrice != 0) {
        $query->where(function ($query) use ($minPrice, $maxPrice) {
            $query->whereBetween('price', [(float)$minPrice, (float)$maxPrice])
                ->orWhere(function ($query) use ($minPrice, $maxPrice) {
                    $query->whereNotNull('price_after_discount')
                          ->whereBetween('price_after_discount', [(float)$minPrice, (float)$maxPrice]);
                });
        });
    }

    switch ($sort) {
        // case 'rating':
        //     $query->orderBy('average_rating', 'desc');
        //     break;
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
            $query->orderBy('id', 'asc');
    }

    $products = $query->paginate(12);  // Adjust the number of items per page as needed

    $categories = Category::all();

    $maxPrice = Product::max('price');

    return view('user.shop-sidebar', compact('products', 'categories', 'priceRange', 'sort', 'maxPrice'));
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
            ->paginate(12); // Adjust the number of items per page as needed

        $categories = Category::all();

        // Return a view with products
        return view('user.shop-sidebar', compact('products', 'categories', 'search'));
    }



    
    public function filterByCategory($id)
{
    // Fetch products belonging to the selected category with pagination
    $products = Product::where('category_id', $id)->paginate(12); // Adjust the number as needed

    // Fetch all categories to display in the sidebar
    $categories = Category::all();

    // Get the current category
    $currentCategory = Category::find($id);
    $maxPrice = $products->max('price');
    // Return the shop sidebar view with filtered products
    return view('user.shop-sidebar', compact('products', 'categories', 'currentCategory', 'maxPrice'));
}

}

