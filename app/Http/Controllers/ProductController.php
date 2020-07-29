<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class ProductController extends Controller
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
            $products = Product::where('status', true)
                ->orderBy('name', 'asc')
                ->withCount('ratings')
                ->with(["classificationproducts"])
                ->get();
            $response = $products;
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
                'description' => 'required',
                'price' => 'required',
                'type_id' => 'required'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return $this->responseErrors($e->errors(), 422);
        }
        if (JWTAuth::parseToken()->authenticate()) {
            $product = new Product();
            $product->name = $request->input('name');
            $product->description = $request->input('description');
            $product->price = $request->input('price');
            $product->status = true;
            $product->type_id = $request->input('type_id');
            if ($product->save()) {
                $product->classificationproducts()->sync($request->input('classificationproducts_id') == null ?
                    [] : $request->input('classificationproducts_id'));
                $response = [
                    'message' => 'New product registered successfully',
                ];
                return response()->json($response, 201);
            }
            $response = [
                'message' => 'Error: Cannot register the product'
            ];
        } else {
            return response()->json(['message' => 'User not authenticated'], 404);
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
            $products = Product::where('id', $id)
                ->with(["classificationproducts"])
                ->first();
            $response = $products;
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
                'description' => 'required',
                'price' => 'required',
                'type_id' => 'required'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return $this->responseErrors($e->errors(), 422);
        }
        if (JWTAuth::parseToken()->authenticate()) {
            $product = Product::find($id);
            $product->name = $request->input('name');
            $product->description = $request->input('description');
            $product->price = $request->input('price');
            $product->status = true;
            $product->type_id = $request->input('type_id');
            if ($product->update()) {
                $product->classificationproducts()->sync($request->input('classificationproducts_id') == null ?
                    [] : $request->input('classificationproducts_id'));
                $response = [
                    'message' => 'Product updated successfully',
                ];
                return response()->json($response, 200);
            }
            $response = [
                'message' => 'Error: Cannot update product registry'
            ];
        } else {
            return response()->json(['message' => 'Not authorized'], 404);
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
