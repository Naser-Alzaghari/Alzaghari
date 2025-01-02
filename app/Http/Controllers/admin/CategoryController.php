<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Display a listing of users
    public function index()
    {
        $categories = Category::all();
        

    //     $category = Category::with('category')->findOrFail($id);

    // // Access the category name
    // $categoryName = $category->category->name;
        return view('admin.categories.index', compact('categories'));
    }

    // Show the form for creating a new user
    public function create()
    {
        $categories = Category::all();
        return view('admin.categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Add image validation
        ]);
        
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('categories', 'public');
        }

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.categories')->with('success', 'Category created successfully.');
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Add image validation
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('categories', 'public');
            $category->image = $imagePath;
        }

        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        return redirect()->route('admin.categories')->with('success', 'Category updated successfully.');
    }


    // Display the specified user
    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    // Show the form for editing the specified Category
    public function edit(Category $category)
    {
        return view('admin.Categories.create', compact('category'));
    }

    

    // Remove the specified user from the database
    public function destroy($id)
    {
        // Find the category by ID
        $category = Category::findOrFail($id);

        // Check if the category has any related products
        if ($category->products()->exists()) {
            // If there are products associated with the category, block the deletion
            return redirect()->route('admin.categories')->with('error', 'Cannot soft delete this category because it has products.');
        }

        // Soft delete the category
        $category->delete();

        // Redirect back with a success message
        return redirect()->route('admin.categories')->with('success', 'Category soft-deleted successfully!');
    }

}
