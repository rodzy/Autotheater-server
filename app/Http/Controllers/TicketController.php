<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class TicketController extends Controller
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
            $tickets = Ticket::where('active', true)
                ->orderBy('pricing', 'asc')
                ->get();
            $response = $tickets;
            return  response()->json($response, 200);
        } catch (\Exception $e) {
            return  response()->json($e->getMessage(), 422);
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
                'description' => 'required',
                'pricing' => 'required',
            ]);
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['message' => 'User not authenticated'], 404);
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            return $this->responseErrors($e->errors(), 422);
        }
        try {
            $ticket = new Ticket();
            $ticket->name = $request->name;
            $ticket->description = $request->description;
            $ticket->pricing = $request->pricing;
            $ticket->save();
            $response=([
                'message'=>'New ticket registered successfully',
                'data'=>$ticket
            ]);
            return response()->json($response,201);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(),422);
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
            $tickets=Ticket::where('id',$id)
            ->first();
            $response=$tickets;
            return response()->json($response,200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(),422);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
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
                'description' => 'required',
                'pricing' => 'required',
            ]);
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['message' => 'User not authenticated'], 404);
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            return $this->responseErrors($e->errors(), 422);
        }
        $ticket = Ticket::find($id);
        $ticket->name = $request->input('name');
        $ticket->description = $request->input('description');
        $ticket->pricing = $request->input('pricing');
        if ($ticket->update()) {
            $ticket->input('genres')->sync($request->input('genres') == null ?
                [] : $request->input('genres'));
            $response = [
                'message' => 'Ticket updated successfully',
            ];
            return response()->json($response, 200);
        }
        $response = [
            'message' => 'Error: Cannot update ticket registry'
        ];
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
