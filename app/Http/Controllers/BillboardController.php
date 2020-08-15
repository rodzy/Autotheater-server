<?php

namespace App\Http\Controllers;

use App\Billboard;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class BillboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth', ['only' => ['store', 'update']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $billboard = Billboard::where('status', true)
                ->orderBy('show_date', 'asc')
                ->get();
            $response = $billboard;
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

                'date_now' => 'required|date',
                'show_date' => 'required|date',
                'status' => 'required',
                'capacity' => 'required|integer',
                'movie_id' => 'required',
                'location_id' => 'required',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return $this->responseErrors($e->errors(), 422);
        }
        if (JWTAuth::parseToken()->authenticate()) {
            $billboard = new Billboard();
            $billboard->date_now = $request->input('date_now');
            $billboard->show_date = $request->input('show_date');
            $billboard->status = $request->input('status');
            $billboard->capacity = $request->input('capacity');
            $billboard->movie_id = $request->input('movie_id');
            $billboard->location_id = $request->input('location_id');
            if ($billboard->save()) {
                $response = [
                    'message' => 'Added to the billboard',
                ];
                return response()->json($response, 201);
            } else {
                $response = [
                    'message' => 'Error: Cannot register the billboard'
                ];
                return response()->json($response, 404);
            }
        } else {
            return response()->json(['message' => 'Not authorized'], 401);
        }
    }

    /**
     * Filter dates
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $billboard = Billboard::where('id', $id)
                ->get()->first();
            return response()->json($billboard, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }


    /**
     * Filter dates
     *
     * @param  datetime $date
     * @return \Illuminate\Http\Response
     */
    public function filter($date)
    {
        try {
            $billboard = Billboard::where('show_date', $date)
                ->orWhere('show_date', 'like', '%' . $date . '%')
                ->orderBy('show_date', 'asc')
                ->get();
            return response()->json($billboard, 200);
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
                'date_now' => 'required|date',
                'show_date' => 'required|date',
                'status' => 'required',
                'capacity' => 'required|integer',
                'movie_id' => 'required',
                'location_id' => 'required',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return $this->responseErrors($e->errors(), 422);
        }
        if (JWTAuth::parseToken()->authenticate()) {
            $billboard = Billboard::find($id);
            $billboard->date_now = $request->input('date_now');
            $billboard->show_date = $request->input('show_date');
            $billboard->status = $request->input('status');
            $billboard->capacity = $request->input('capacity');
            $billboard->movie_id = $request->input('movie_id');
            $billboard->location_id = $request->input('location_id');
            if ($billboard->update()) {
                $response = [
                    'message' => 'Updated the billboard',
                ];
                return response()->json($response, 201);
            } else {
                $response = [
                    'message' => 'Error: Cannot update the billboard'
                ];
                return response()->json($response, 404);
            }
        } else {
            return response()->json(['message' => 'Not authorized'], 401);
        }
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
