<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tipo;
use Illuminate\Http\Request;

class TipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tipos=Tipo::included()->filter()->sort()->get();
        return $tipos;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre_tipo' => 'required|max:255',
            'url' => 'required |max:255'
            
        ]);

        $tipo=Tipo::create($request->all());

        return $tipo;
    }

    /**
     * Display the specified resource.
     */
    public function show(Tipo $tipo)
    {
        //
        $tipo =Tipo::included()->findOrFail($tipo);
       return $tipo;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tipo $tipo)
    {
        //
        $request->validate([
            'nombre_tipo' => 'required|max:255',
            'url' => 'required |max:255'
            
        ]);

        $tipo->update($request->all());

        return $tipo;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tipo $tipo)
    {
        //
        $tipo->delete();
        return $tipo;
    }
}
