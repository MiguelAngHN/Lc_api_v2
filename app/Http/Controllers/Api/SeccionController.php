<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Seccion;
use Illuminate\Http\Request;

class SeccionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $seccions=Seccion::included()->filter()->sort()->get();
        return $seccions;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre_seccion' => 'required|max:255',
            'user_id' => 'required',
            
        ]);

        $seccion=Seccion::create($request->all());

        return $seccion;
    }

    /**
     * Display the specified resource.
     */
    public function show(Seccion $seccion)
    {
        //
        $seccion = Seccion::included()->findOrFail($seccion ->id);
        return $seccion;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Seccion $seccion)
    {
        //
        $request->validate([
            'nombre_seccion' => 'required|max:255',
            'user_id' => 'required',
            
            
            
        ]);

        $seccion->update($request->all());

        return $seccion;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Seccion $seccion)
    {
        //
        $seccion->delete();
        return $seccion;
    }
}
