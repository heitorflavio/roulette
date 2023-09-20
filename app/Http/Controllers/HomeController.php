<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Http\Requests\StoreHomeRequest;
use App\Http\Requests\UpdateHomeRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use App\Models\Box;
use App\Models\Product;



class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $cases = box::where('status', 1)->get();

        

        return Inertia::render('Home', [
            'cases' => $cases,
        ]);
     
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHomeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($name)
    {
        $case = box::where('link', $name)->first();
        $items = Product::where('box_id', $case->id)->get();
        return Inertia::render('Case', [
            'box' => $case,
            'items' => $items,
            'balances' => auth()->user()->balance,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Home $home)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHomeRequest $request, Home $home)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Home $home)
    {
        //
    }
}
