<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Boceto;

class BocetoController extends Controller
{
    public function index()
    {
        //
        $bocetos = Boceto::all();
        return response()->json($bocetos);
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

        $boceto = new Boceto();
        $boceto->nombre_boceto = $request->nombre_boceto;
        $boceto->url = $request->url;
        $boceto->save();

        return response()->json($boceto);
    }

    /**
     * Display the specified resource.
     */
    public function show(Boceto $boceto)
    {
        //

        return response()->json($boceto);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Boceto $boceto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Boceto $boceto)
    {
        //

        $boceto->nombre_boceto = $request->nombre_boceto;
        $boceto->url = $request->url;
        $boceto->save();

        return response()->json($boceto);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Boceto $boceto)
    {
        //
        $boceto->delete();
        return response()->json($boceto);
    }
}
