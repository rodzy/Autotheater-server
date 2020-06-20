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
            $movies = Movie::select('movies.name', 'movies.sinopsis', 'classifications.type', 'classifications.description')
                ->join('classifications', 'movies.classification_id', '=', 'classifications.id')
                ->where('movies.status','=',true)
                ->orderBy('movies.name')
                ->get();
            $response = [$movies];
            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //@todo: Dont forget to add where before production
        // try {
        //     $movies = Movie::select('movies.name', 'movies.sinopsis', 'classifications.type', 'classifications.description')
        //         ->join('classifications', 'movies.classification_id', '=', 'classifications.id')
        //         ->get();
        //     $response = [$movies];
        //     return response()->json($response, 200);
        // } catch (\Exception $e) {
        //     return response()->json($e->getMessage(), 422);
        // }
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
