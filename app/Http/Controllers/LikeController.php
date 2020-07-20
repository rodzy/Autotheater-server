<?php

namespace App\Http\Controllers;

use App\Like;
use App\Movie;

class LikeController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        $movie = Movie::with('likes')->findOrFail($id);
        $like = new Like();
        if ($movie->likes()->save($like)) {

            return response()->json('Movie liked!', 201);
        }

        $response = [
            'msg' => 'Cannot like the movie'
        ];

        return response()->json($response, 404);
    }
}
