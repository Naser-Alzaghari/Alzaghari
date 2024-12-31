<?php

namespace App\Http\Controllers\admin;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    // Display a listing of reviews
    public function index()
    {
        $reviews = Review::orderBy('id', 'desc')->get();
        return view('admin.reviews', compact('reviews'));
    }

    // Show the form for creating a new review
    

   

    // Display the specified review
    public function show(Review $review)
    {
        return view('reviews.show', compact('review'));
    }

    
    public function store(Request $request)
{
    // Validate the input
    $request->validate([
        'product_id' => 'required|integer|exists:products,id',
        'rating' => 'required|integer|between:1,5',
        'review' => 'nullable|string|max:1000',
    ]);

    // Check if the user has already reviewed the product
    $existingReview = Review::where('product_id', $request->input('product_id'))
                            ->where('user_id', Auth::id())
                            ->first();

    if ($existingReview) {
        return redirect()->back()->withErrors('You have already reviewed this product.');
    }

    // Create the review
    Review::create([
        'product_id' => $request->input('product_id'),
        'user_id' => Auth::id(),
        'rating' => $request->input('rating'),
        'comment' => $request->input('review') ?? null,
        'is_active' => false,
    ]);

    return redirect()->back()->with('success', 'Review submitted successfully!');
}

    

    // Remove the specified review from the database
    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete(); // Soft delete
        return redirect()->route('admin.reviews')->with('success', 'review soft-deleted successfully!');
    }

    public function toggle(Request $request, Review $review){
        
        $review->is_active ? $review->is_active = 0 : $review->is_active = 1;
        
        $review->save();

        return redirect()->route('admin.reviews')->with('success', 'review updated successfully.');
    }


//     public function restore($id)
// {
//     $review = review::onlyTrashed()->findOrFail($id);
//     $review->restore(); // Restore the review
//     return redirect()->route('admin.reviews.trashed')->with('success', 'review restored successfully!');
// }
}
