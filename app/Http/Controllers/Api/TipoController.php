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
        //  $tipos=Tipo::filter()->sort()->get();
        $tipos = Tipo::filter()->sort()->with('actividad')->get();
        // return response()->json($tipos);
        return $tipos;
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $tipo = new Tipo;
        $tipo->nombre_tipo = $request->nombre_tipo;
        $tipo->url = $request->url;
        $tipo->save();

        return response()->json($tipo);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        // $tipos =Tipo::all()->with('actividads')->findOrFail($tipo);
        $tipos = Tipo::find($id)->with('actividad')->get();
        return $tipos;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tipo $tipo)
    {
        //
        $tipo->nombre_tipo = $request->nombre_tipo;
        $tipo->url = $request->url;
        $tipo->save();

        return response()->json($tipo);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tipo $tipo)
    {
        //
        $tipo->delete();
        return response()->json($tipo);
    }
}
