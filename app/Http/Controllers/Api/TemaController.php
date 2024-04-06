<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tema;
use Illuminate\Http\Request;

class TemaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //      //
    //     $temas=Tema::included()->filter()->sort()->get();
    //     return $temas;
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(Request $request)
    // {
    //     //
    //     $request->validate([
    //         'nombre_tema' => 'required|max:255',
    //         'seccion_id' => 'required',
            
    //     ]);

    //     $tema=Tema::create($request->all());

    //     return $tema;
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(Tema $tema)
    // {
    //     //
    //     $tema = Tema::included()->findOrFail($tema ->id);
    //    return $tema;
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, Tema $tema)
    // {
    //     //
    //     $request->validate([
    //         'nombre_tema' => 'required|max:255',
    //         'seccion_id' => 'required',
            
    //     ]);

    //     $tema->update($request->all());

    //     return $tema;
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(Tema $tema)
    // {
    //     //
    //     $tema->delete();
    //     return $tema;
    // }

    public function index()
    {
        //
        $temas = Tema::all();
        return response()->json($temas);
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
    public function store(Request $request)
    {
        //

        $tema = new Tema();
        $tema->nombre_tema = $request->nombre_tema;
        $tema->descripcion = $request->descripcion;
        $tema->url_imagen = $request->url_imagen;
        $tema->seccion_id = $request->seccion_id;
        $tema->save();

        return response()->json($tema);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tema $tema)
    {
        //

        return response()->json($tema);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tema $tema)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tema $tema)
    {
        //
        $tema->nombre_tema = $request->nombre_tema;
        $tema->descripcion = $request->descripcion;
        $tema->url_imagen = $request->url_imagen;
        $tema->seccion_id = $request->seccion_id;
        $tema->save();

        return response()->json($tema);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tema $tema)
    {
        //
        $tema->delete();
        return response()->json($tema);
    }
}
