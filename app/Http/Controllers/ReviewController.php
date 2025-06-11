<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Upload; // Assuming 'Upload' is your model for the kuliner places

class ReviewController extends Controller
{
    public function store(Request $request, $uploadId)
    {
        // Validate the incoming request
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string|max:1000',
        ]);

        // Find the corresponding place (upload)
        $upload = Upload::findOrFail($uploadId);

        // Create a new review
        $review = new Review();
        $review->rating = $request->rating;
        $review->review = $request->review;
        $review->user_id = auth()->id();  // Assuming user is authenticated
        $review->upload_id = $upload->id;

        // Save the review
        $review->save();

        // Redirect back to the place's detail page with success message
        return redirect()->route('kuliner.show', $uploadId)->with('success', 'Review submitted successfully!');
    }
}
