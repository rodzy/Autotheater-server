<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{

    public function __construct()
    {
        $this->middleware('jwt.auth', ['only' => ['all']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $movies = Movie::where('status', true)
                ->orderBy('name', 'desc')
                ->withCount('likes')
                ->with(["genres"])
                ->get();
            $response = $movies;
            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     * Show all the movies and classifications.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => 'required',
                'sinopsis' => 'required',
                'classification_id' => 'required'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return $this->responseErrors($e->errors(), 422);
        }
        try {
            $movie = new Movie();
            $movie->name = $request->name;
            $movie->sinopsis = $request->sinopsis;
            $movie->classification_id = $request->classification_id;
            $movie->save();
            if ($request->get('genre_id')) {
                $movie->genres()->sync($request->genre_id == null ? [] : $request->get('genre_id'));
            }
            $response = ([
                'message' => 'New movie registered successfully',
                'data' => $movie,
            ]);
            return response()->json($response, 201);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $movies = Movie::where('id', $id)
                ->with(["genres"])
                ->first();
            $response = $movies;
            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        //
    }
}
