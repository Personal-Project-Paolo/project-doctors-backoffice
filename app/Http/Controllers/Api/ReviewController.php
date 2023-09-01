<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::paginate(5);

        return response()->json([
            'success' => true,
            'results' => $reviews,
        ]);
    }

    public function show(Review $review)
    {
        //
    }
}
