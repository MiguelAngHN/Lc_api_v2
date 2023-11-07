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
        //
        $actividad=Actividad::all();
        return $actividad;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' =>'required|max:255',
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
        return $actividad;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Actividad $actividad)
    {
        //
        $request->validate([
            'name' =>'required|max255',
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
