<?php

namespace App\Http\Controllers;

use App\Models\Desarrolladora;
use App\Models\Etiqueta;
use Illuminate\Http\Request;
use App\Models\Videojuego;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Gate;

class VideojuegoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videojuegos = Auth()->user()->videojuegos;
        return view("videojuegos.index", ["videojuegos" => $videojuegos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("videojuegos.create", ["desarrolladoras" => Desarrolladora::all(), "etiquetas" => Etiqueta::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'portada' => 'required|mimes:jpg,png,jpeg|max:400',
        ]);

        $image = $request->file('portada');
        $nombre = hash('sha256', time() . $image->getClientOriginalName()) . ".png";
        $image->storeAs('uploads/portadas', $nombre, 'public');

        $manager = new ImageManager(new Driver());
        $imageR = $manager->read(Storage::disk('public')->get('uploads/portadas/' . $nombre));
        $imageR->scaleDown(200); //cambiar esto para ajustar el reescalado de la imagen
        $rute = Storage::path('public/uploads/portadas/' . $nombre);
        $imageR->save($rute);


        $videojuego = Videojuego::create([
            "titulo" => $request->titulo,
            "anyo" => $request->anyo,
            "desarrolladora_id" => $request->desarrolladora_id,
            "portada" => 'storage/uploads/portadas/' . $nombre,
        ]);
        if($request->etiquetas){
            foreach($request->etiquetas as $etiqueta){
                $videojuego->etiquetas()->attach($etiqueta);
            }
        }
        return redirect()->route("videojuegos.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Videojuego $videojuego)
    {
        return view("videojuegos.show", ["videojuego" => $videojuego]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Videojuego $videojuego)
    {
        if (!Gate::allows('update', $videojuego)) {
            abort(403);
        }
        return view("videojuegos.edit", ["videojuego" => $videojuego, "desarrolladoras" => Desarrolladora::all(), "etiquetas" => Etiqueta::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Videojuego $videojuego)
    {

        $request->validate([
            'portada' => 'required|mimes:jpg,png,jpeg|max:400',
        ]);

        $image = $request->file('portada');
        $nombre = hash('sha256', time() . $image->getClientOriginalName()) . ".png";
        $image->storeAs('uploads/portadas', $nombre, 'public');

        $manager = new ImageManager(new Driver());
        $imageR = $manager->read(Storage::disk('public')->get('uploads/portadas/' . $nombre));
        $imageR->scaleDown(200); //cambiar esto para ajustar el reescalado de la imagen
        $rute = Storage::path('public/uploads/portadas/' . $nombre);
        $imageR->save($rute);

        $videojuego->etiquetas()->detach();
        $videojuego->update([
            "titulo" => $request->titulo,
            "anyo" => $request->anyo,
            "desarrolladora_id" => $request->desarrolladora_id,
            "portada" => 'storage/uploads/portadas/' . $nombre,
        ]);
        if($request->etiquetas){
            foreach($request->etiquetas as $etiqueta){
                $videojuego->etiquetas()->attach($etiqueta);
            }
        }
        return redirect()->route("videojuegos.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Videojuego $videojuego)
    {
        if (!Gate::allows('update', $videojuego)) {
            abort(403);
        }
        $videojuego->delete();
        return redirect()->route("videojuegos.index");
    }
    public function poseoIndex()
    {
        return view("videojuegos.poseoIndex", ["videojuegos" => Videojuego::all()]);
    }
    public function poseoCreate(Request $request)
    {
        $videojuego = Videojuego::find($request->videojuego_id);
        $user = auth()->user();
        if ($request->tipo == "Lo tengo") {
            if (!$user->videojuegos->find($request->videojuego_id)) {
                $videojuego->users()->attach($user->id);
            }
        } else if ($request->tipo == "No lo tengo") {
            $videojuego->users()->detach($user->id);
        }
        return redirect()->route("videojuegos.index");
    }
}
