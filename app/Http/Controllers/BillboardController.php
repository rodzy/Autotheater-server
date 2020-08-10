<?php

namespace App\Http\Controllers;

use App\Billboard;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class BillboardController extends Controller
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
        // try {
        //     $billboard = Billboard::where('status', true)
        //         ->orderBy('name', 'desc')
        //         ->withCount('likes')
        //         ->with(["genres"])
        //         ->get();
        //     $response = $billboard;
        //     return response()->json($response, 200);
        // } catch (\Exception $e) {
        //     return response()->json($e->getMessage(), 422);
        // }
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request,[

                'date_now'=>'required|date',
                'show_date'=>'required|date',
                'status'=>'required',
                'capacity'=>'required|integer',
                'movie_id'=>'required',
                'location_id'=>'required',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return $this->responseErrors($e->errors(),422);
        }
        if(JWTAuth::parseToken()->authenticate()){
            $billboard=new Billboard();
            $billboard->date_now=$request->input('date_now');
            $billboard->show_date=$request->input('show_date');
            $billboard->status=$request->input('status');
            $billboard->capacity=$request->input('capacity');
            $billboard->movie_id=$request->input('movie_id');
            $billboard->location_id=$request->input('location_id');
            if($billboard->save()){
                $response = [
                    'message' => 'Added to the billboard',
                ];
                return response()->json($response, 201);
            }else{
                $response = [
                    'message' => 'Error: Cannot register the movie'
                ];
                return response()->json($response, 404);
            }
        }else{
            return response()->json(['message' => 'Not authorized'], 401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Billboard  $billboard
     * @return \Illuminate\Http\Response
     */
    public function show(Billboard $billboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Billboard  $billboard
     * @return \Illuminate\Http\Response
     */
    public function edit(Billboard $billboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Billboard  $billboard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Billboard $billboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Billboard  $billboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Billboard $billboard)
    {
        //
    }
}
