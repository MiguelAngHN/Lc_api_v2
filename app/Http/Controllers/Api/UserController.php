<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {   
    //     $users=User::filter()->sort()->get();
    //     return $users;
    // }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     //
    //     $request->validate([
    //         'name' => 'required|max:255',
    //         'email' => 'required|max:255',
    //         'password' => 'required|max:255',
            
    //     ]);

    //     $user=User::create($request->all());

    //     return $user;
        
    // }

    /**
     * Display the specified resource.
     */
    // public function show(User $user)
    // {
    //     //
    //     $user = User::included()->findOrFail($user->id);
    //    return $user;
    // }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, User $user)
    // {
    //     //
    //     $request->validate([
    //         'name' => 'required|max:255',
    //         'email' => 'required|max:255',
    //         'password' => 'required|max:255',
            
    //     ]);

    //     $user->update($request->all());

    //     return $user;
    // }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(User $user)
    // {
    //     //
    //     $user->delete();
    //     return $user;
    // }

    public function index()
    {
        //
        $users = User::all();
        return response()->json($users);
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

        $user = new User;
        $user->nombre_usuario = $request->nombre_usuario;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->rol = $request->rol;
        $user->save();

        return response()->json($user);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //

        return response()->json($user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
        $user->nombre_usuario = $request->nombre_usuario;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->rol = $request->rol;
        $user->save();

        return response()->json($user);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        $user->delete();
        return response()->json($user);
    }
}
