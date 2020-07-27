<?php

namespace App\Http\Controllers;

use App\Product;
use App\Rating;

class RatingController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        $product = Product::with('ratings')->findOrFail($id);
        $rating = new Rating();
        if ($product->ratings()->save($rating)) {
            return response()->json('Product succesfully rated!', 201);
        }
        $response = [
            'message' => 'Cannot like the product'
        ];
        return response()->json($response, 404);
    }
}
