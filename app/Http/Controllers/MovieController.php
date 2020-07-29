<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class MovieController extends Controller
{

    public function __construct()
    {
        $this->middleware('jwt.auth', ['only' => ['store','update']]);
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
                ->orderBy('name', 'asc')
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
                'sinopsis' => 'required|min:10',
                'image' => 'required',
                'banner' => 'required',
                'classification_id' => 'required',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return $this->responseErrors($e->errors(), 422);
        }
        if(JWTAuth::parseToken()->authenticate()){
            $movie = new Movie();
            $movie->name = $request->input('name');
            $movie->sinopsis = $request->input('sinopsis');
            $movie->image = $request->input('image');
            $movie->banner = $request->input('banner');
            $movie->classification_id = $request->input('classification_id');
            if ($movie->save()) {
                $movie->genres()->sync($request->input('genres') == null ?
                [] : $request->input('genres'));
                $response = [
                    'message' => 'New movie registered successfully',
                ];
                return response()->json($response, 201);
            }
            $response = [
                'message' => 'Error: Cannot register the movie'
            ];
        }else{
            return response()->json(['message' => 'Not authorized'], 401);
        }
        return response()->json($response, 404);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $this->validate($request, [
                'name' => 'required',
                'sinopsis' => 'required',
                'image' => 'required',
                'banner' => 'required',
                'classification_id' => 'required',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return $this->responseErrors($e->errors(), 422);
        }
        if(JWTAuth::parseToken()->authenticate()){
            $movie = Movie::find($id);
            $movie->name = $request->input('name');
            $movie->sinopsis = $request->input('sinopsis');
            $movie->image = $request->input('image');
            $movie->banner = $request->input('banner');
            $movie->classification_id = $request->input('classification_id');
            if ($movie->update()) {
                $movie->genres()->sync($request->input('genres') == null ?
                [] : $request->input('genres'));
                $response = [
                    'message' => 'Movied updated successfully',
                ];
                return response()->json($response, 200);
            }
            $response = [
                'message' => 'Error: Cannot update movie registry'
            ];
        }else{
            return response()->json(['message' => 'Not authorized'], 401);
        }
        return response()->json($response, 404);
    }


    public function responseErrors($errors, $statusHTML)
    {
        $transformed = [];
        foreach ($errors as $field => $message) {
            $transformed[] = [
                'field' => $field,
                'message' => $message[0]
            ];
        }
        return response()->json(['errors' => $transformed], $statusHTML);
    }
}
