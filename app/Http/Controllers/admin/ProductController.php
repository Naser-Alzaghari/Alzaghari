<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Display a listing of users
    public function index()
    {
        $products = Product::all();
        

    //     $product = Product::with('category')->findOrFail($id);

    // // Access the category name
    // $categoryName = $product->category->name;
        return view('admin.products.index', compact('products'));
    }

    // Show the form for creating a new user
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    // Store a newly created user in the database
    public function store(Request $request)
    {
        
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|integer|exists:categories,id',
            'price' => 'required|numeric',
            'price_after_discount' => 'nullable|numeric',
            'stock' => 'required|integer',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate images
            'video' => 'nullable',
        ]);
        // Create product
        $product = Product::create($validated);

        


        if ($request->hasFile('images')) {
            
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('images', 'public');
                $product->images()->create(['image_url' => $imagePath]);
            }
        }

        
        return redirect()->route('admin.products')->with('success', 'product created successfully.');
    }

    // Display the specified user
    public function show(Product $product)
    {
        return view('user.product-details', compact('product'));
    }

    // Show the form for editing the specified product
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.create', compact('product', 'categories'));
    }

    public function addStockForm(Product $product)
    {
        return view('admin.products.addStock', compact('product'));
    }


    public function addStock(Request $request, Product $product)
    {
        return view('admin.products.addStock', compact('product'));
    }

    


    // Update the specified user in the database
    public function update(Request $request, Product $product)
    {
        // Validate the request
        $video_url = $request->input('video');
    
        // Decode URL if needed (optional)
        $video_url = urldecode($video_url);
        try{
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'category_id' => 'required|integer|exists:categories,id',
                'price' => 'required|numeric',
                'price_after_discount' => 'nullable|numeric',
                'stock' => 'required|integer',
                'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate images
                'video' => 'nullable',
            ]);
        } catch(Exception $e) {
            dd($e);
        }
        

        // Update product details
        $product->update($validated);
        $product->update([
            'video' => $video_url,
        ]);
    

        // Delete selected images
        if ($request->has('delete_images')) {
            foreach ($request->delete_images as $imageId) {
                $image = $product->images()->find($imageId);
                if ($image) {
                    // Delete the file from storage
                    Storage::disk('public')->delete($image->image_url);
                    // Delete the record from the database
                    $image->delete();
                }
            }
        }

        // Upload and save new images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('images', 'public');
                $product->images()->create(['image_url' => $imagePath]);
            }
        }
        $product->save();

        return redirect()->route('admin.products')->with('success', 'product updated successfully.');
    }

    // Remove the specified user from the database
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete(); // Soft delete
        return redirect()->route('admin.products')->with('success', 'product soft-deleted successfully!');
    }

    



//     public function restore($id)
// {
//     $product = User::onlyTrashed()->findOrFail($id);
//     $product->restore(); // Restore the user
//     return redirect()->route('users.trashed')->with('success', 'User restored successfully!');
// }
}
