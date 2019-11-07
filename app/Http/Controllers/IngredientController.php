<?php

namespace App\Http\Controllers;

use App\Http\Requests\Ingredient\DeleteRequest;
use App\Http\Requests\Vendor\AddRequest;
use App\Ingredient;
use App\Vendor;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Vendor $vendor)
    {
        return  $vendor->ingredients()->get();
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
    public function store(\App\Http\Requests\Ingredient\AddRequest $request, Vendor $vendor)
    {
        $ingredient = $vendor->ingredients()->create($request->only(['name', 'unit', 'price']));
        return  response()->json([
            'message' => 'Successfully Added',
            'ingredient' => $ingredient
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vendor $vendor, Ingredient $ingredient)
    {
        $ingredient->update($request->only(['name', 'unit', 'price']));

        return  response()->json([
            'message' => 'Successfully Updated',
            'ingredient' => $ingredient->refresh()
        ]);
    }

    public function destroy(DeleteRequest $request,Vendor $vendor,Ingredient $ingredient)
    {
        $ingredient->delete();
        return response(['message' => 'deleted Successfully']);
    }
}
