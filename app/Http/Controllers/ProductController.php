<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Box;
use Inertia\Inertia;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $boxs = Box::all();

        return Inertia::render('ProductCreate',[
            'boxs' => $boxs,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        // return $request->all();
        $request->validate([
            'name'  => 'required',
            'image_path' => 'required',
            'description' => 'required',
            'price' => 'required',
            'probability' => 'required',
            'box_id' => 'required',
        ]);
        
        $product = Product::create([
            'name'  => $request->name,
            'image_path' => $request->image_path,
            'description' => $request->description,
            'price' => floatval($request->price),
            'probability' => $request->probability,
            'box_id' => $request->box_id,
            'status' => 1,
        ]);

        return redirect('/box/' . $request->box_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect('/box/' . $product->box_id);
    }
}
