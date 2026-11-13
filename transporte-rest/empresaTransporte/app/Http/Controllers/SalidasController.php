<?php

namespace App\Http\Controllers;

use App\Models\salidas;
use Illuminate\Http\Request;

class SalidasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $datos = $request->validate([
            "destino"=>"",
            "fecha"=> ""
        ]);
    
        $destino = $datos["destino"];
        $fecha = $datos["fecha"];

        if($destino === "" or $fecha === ""){
            $salidas = Salidas::all();
            return response()->json($salidas, 200);
        } else{
            $salidas = Salidas::all()->where("destino", $destino)->first();
            return response()->json($salidas, 200);
        }
        // $salidas = Salidas::all();
        // return response()->json($salidas, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $candidato = salidas::create($request->all());
        return response()->json($candidato, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(salidas $salidas)
    {
        $salida = Salidas::all()->where("id", $salidas->id)->first();
        return response()->json($salida, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, salidas $salidas)
    {
        $salidas->update($request->all());
        return response()->json($salidas, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(salidas $salidas)
    {
        //
    }
}
