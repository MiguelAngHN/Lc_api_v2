<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Multimedia;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MultimediaController extends Controller
{
   
    // public function index()
    // {
    //     //
    //     $multimedias = Multimedia::all();
    //     return response()->json($multimedias);
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(Request $request)
    // {
    //     //

    //     $multimedia = new Multimedia;
    //     $multimedia->url = $request->url;
    //     $multimedia->save();

    //     return response()->json($multimedia);
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(Multimedia $multimedia)
    // {
    //     //

    //     return response()->json($multimedia);
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(Multimedia $multimedia)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, Multimedia $multimedia)
    // {
    //     //
    //     $multimedia->url = $request->url;
    //     $multimedia->save();

    //     return response()->json($multimedia);

    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(Multimedia $multimedia)
    // {
    //     //
    //     $multimedia->delete();
    //     return response()->json($multimedia);
    // }

    public function index()
    {
        //
        $multimedias = Multimedia::all();
        return response()->json($multimedias);
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
        // Validar el archivo recibido
        $request->validate([
            'file' => 'required|image'
        ]);
    
        // Almacenar el archivo en el almacenamiento local
        $imagenPath = $request->file('file')->store('public/imagenes');
    
        // Obtener la URL del archivo guardado
        $url = Storage::url($imagenPath);
    
        // Crear una nueva instancia del modelo Multimedia y guardar la URL en la base de datos
        $multimedia = Multimedia::create([
            'url' => $url
        ]);
    
        // Devolver una respuesta JSON con el objeto multimedia creado
        return response()->json($multimedia, 201);
    }
    

    //     public function store(Request $request)
    // {
    //     //

    //     $multimedia = new Multimedia();
    //     $multimedia->file = $request->file;
    //     $multimedia->save();

    //     return response()->json($multimedia);

    // }



    /**
     * Display the specified resource.
     */
    public function show(Multimedia $multimedia)
    {
        //

        return response()->json($multimedia);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Multimedia $multimedia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Multimedia $multimedia)
    {
        //
        $multimedia->url = $request->url;
        $multimedia->save();

        return response()->json($multimedia);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Multimedia $multimedia)
    {
        //
        $multimedia->delete();
        return response()->json($multimedia);
    }
}
