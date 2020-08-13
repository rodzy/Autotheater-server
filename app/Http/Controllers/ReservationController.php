<?php

namespace App\Http\Controllers;

use App\Reservation;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class ReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth', ['only' => ['store']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $reservation = Reservation::where('status', true)
                ->orderBy('id', 'desc')->with(["tickets", "products"])
                ->get();
            return response()->json($reservation, 200);
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
                'date_now' => 'required',
                'tax' => 'required',
                'total' => 'required',
                'status' => 'required',
                'billboard_id' => 'required',
                'user_id' => 'required',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return $this->responseErrors($e->errors(), 422);
        }
        if (JWTAuth::parseToken()->authenticate()) {
            $reservation = new Reservation();
            $reservation->date_now = $request->input('date_now');
            $reservation->tax = $request->input('tax');
            $reservation->total = $request->input('total');
            $reservation->status = $request->input('status');
            $reservation->billboard_id = $request->input('billboard_id');
            $reservation->user_id = $request->input('user_id');
            if ($reservation->save()) {
                $reservation->tickets()->sync($request->input('tickets') == null ?
                    [] : $request->input('tickets'));
                $reservation->products()->sync($request->input('products') == null ?
                    [] : $request->input('products'));
                $response = [
                    'message' => 'Reservation registered successfully',
                ];
                return response()->json($response, 201);
            }
            $response = [
                'message' => 'Error: Cannot register the reservation'
            ];
        } else {
            return response()->json(['message' => 'Not authorized'], 401);
        }
        return response()->json($response, 404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $reservation = Reservation::where('id', $id)
                ->with(["tickets", "products"])
                ->first();
            $response = $reservation;
            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
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
