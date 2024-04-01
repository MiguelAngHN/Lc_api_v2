<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Actividad;
use Illuminate\Http\Request;

class ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $actividads=Actividad::included()->filter()->sort()->with('tipo')->get();

        return $actividads;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre_actividad' => 'required|max:255',
            'user_id' => 'required',
            'tema_id' => 'required',
            'tipo_id' => 'required',
            'multimedia_id' => 'required',
            
        ]);

        $actividad=Actividad::create($request->all());

        return $actividad;
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Actividad $actividad)
    {
        //
        $actividad = Actividad::included()->findOrFail($actividad->id);
       return $actividad;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Actividad $actividad)
    {
        //
        $request->validate([
            'nombre_actividad' => 'required|max:255',
            'user_id' => 'required',
            'tema_id' => 'required',
            'tipo_id' => 'required',
            'multimedia_id' => 'required',
            
        ]);

        $actividad->update($request->all());

        return $actividad;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Actividad $actividad)
    {
        //
        $actividad->delete();
        return $actividad;
    }
}
