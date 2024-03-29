<?php

namespace App\Http\Controllers;

use App\ClassificationProduct;
use Illuminate\Http\Request;

class ClassificationProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $classification = ClassificationProduct::orderBy('id', 'asc')
                ->get();
            $response = $classification;
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
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $classification = ClassificationProduct::where('id', $id)
                ->first();
            $response = $classification;
            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClassificationProduct  $classificationProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassificationProduct $classificationProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClassificationProduct  $classificationProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassificationProduct $classificationProduct)
    {
        //
    }

}
