<?php

namespace App\Http\Controllers;

use App\Models\Box;
use App\Http\Requests\StoreBoxRequest;
use App\Http\Requests\UpdateBoxRequest;
use App\Models\Product;
use App\Models\User;

class BoxController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBoxRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Box $box)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Box $box)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBoxRequest $request, Box $box)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Box $box)
    {
        //
    }

    public function open($boxId)
    {




        $box = Box::find($boxId);
        // Obtém o prêmio aleatório

        $user = User::find(auth()->user()->id);

        if ($user->balance < $box->price) {
            return response()->json([
                'message' => 'Você não tem saldo suficiente para abrir este baú.',
            ], 400);
        }

        $user->balance -= $box->price;
        $user->save();



        $premios = Product::where('box_id', $box->id)->get();

        $expandedArray = [];

        foreach ($premios as $product) {
            $probability = $product['probability'];

            // Calcular quantas vezes o produto deve ser adicionado com base na probabilidade
            $numOccurrences = floor($probability / 100 * 10); // 10 é o fator de escala

            // Adicionar o produto ao novo array várias vezes com base na probabilidade
            for ($i = 0; $i < $numOccurrences; $i++) {
                $expandedArray[] = $product;
            }
        }

        // return $expandedArray;
        $premioAleatorio = $this->calcularPremioAleatorio($premios);


        $user->balance += $premioAleatorio->price;
        $user->save();

        // $premioAleatorio = $expandedArray[array_rand($expandedArray)];

        // return $premioAleatorio;
        // return $premioAleatorio;

        // Se o prêmio aleatório for nulo, retorna erro
        // if (is_null($premioAleatorio)) {
        //     return response()->json([
        //         'message' => 'Não há prêmios disponíveis para este baú.',
        //     ], 400);
        // }

        // Retorna o prêmio aleatório
        return response()->json([
            'message' => 'Prêmio obtido com sucesso!',
            'item' => $premioAleatorio,
            'balance' => $user->balance,
        ], 200);
    }

    private function calcularPremioAleatorio($premios)
    {

        $expandedArray = [];

        foreach ($premios as $product) {
            $probability = $product['probability'];

            // Calcular quantas vezes o produto deve ser adicionado com base na probabilidade
            $numOccurrences = floor($probability / 100 * 10); // 10 é o fator de escala

            // Adicionar o produto ao novo array várias vezes com base na probabilidade
            for ($i = 0; $i < $numOccurrences; $i++) {
                $expandedArray[] = $product;
            }
        }

        // return $expandedArray;
        // $premioAleatorio = $this->calcularPremioAleatorio($premios);

        return $expandedArray[array_rand($expandedArray)];
    }
}
