<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewAdminController extends Controller
{
    public function index()

        {
            $reviews = Review::with(['user', 'upload'])->get();
            return view('admin.review', compact('reviews'));
        }
}
