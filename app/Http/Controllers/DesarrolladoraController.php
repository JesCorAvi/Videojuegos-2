<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Desarrolladora;
use App\Models\Distribuidora;
use App\Models\Etiqueta;
use Illuminate\Support\Facades\Gate;

class DesarrolladoraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("desarrolladoras.index", ["desarrolladoras" => Desarrolladora::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("desarrolladoras.create", ["distribuidoras" => Distribuidora::all(), "etiquetas" => Etiqueta::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $desarrolladora = Desarrolladora::create([
            "nombre" => $request->nombre,
            "distribuidora_id" =>$request->distribuidora_id
        ]);
        if($request->etiquetas){
            foreach($request->etiquetas as $etiqueta){
                $desarrolladora->etiquetas()->attach($etiqueta);
            }
        }

        return redirect()->route("desarrolladoras.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Desarrolladora $desarrolladora)
    {
        return view("desarrolladoras.show", ["desarrolladora" => $desarrolladora]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Desarrolladora $desarrolladora)
    {
        if (!Gate::allows('update', $desarrolladora)) {
            abort(403);
        }
        return view("desarrolladoras.edit", ["desarrolladora" => $desarrolladora, "distribuidoras" => Distribuidora::all(), "etiquetas" => Etiqueta::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Desarrolladora $desarrolladora)
    {

        $desarrolladora->etiquetas()->detach();
        $desarrolladora->update([
            "nombre" => $request->nombre,
            "destribuidora_id" =>$request->destribuidora_id
        ]);
        if($request->etiquetas){
            foreach($request->etiquetas as $etiqueta){
                $desarrolladora->etiquetas()->attach($etiqueta);
            }
        }
        return redirect()->route("desarrolladoras.index");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Desarrolladora $desarrolladora)
    {
        //
    }
}
