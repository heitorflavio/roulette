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
use App\Models\User;
use Illuminate\Support\Facades\Auth;



class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $cases = box::where('status', 1)->get();

        if( auth()->user()){
            $balance = auth()->user()->balance;
        }else{
            $balance = 0;
        }

        return Inertia::render('Home', [
            'cases' => $cases,
            'balances' => $balance,
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

        if( auth()->user()){
            $balance = auth()->user()->balance;
        }else{
            $balance = 0;
        }

        return Inertia::render('Case', [
            'box' => $case,
            'items' => $items,
            'balances' => $balance,
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

    public function login(Request $request){
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/');
        } else {
            // Login falhou, exibir mensagem de erro
            return redirect()->back()->withErrors(['login' => 'Credenciais inválidas, tente novamente.']);
        }
    }

    public function register(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',       
        ]);


        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),

        ]);


        return redirect('/login');

     
    }
}
