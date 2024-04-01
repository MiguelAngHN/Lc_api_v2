<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ActividadController;
use App\Http\Controllers\Api\TipoController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\TemaController;
use App\Http\Controllers\Api\MultimediaController;
use App\Http\Controllers\Api\SeccionController;
use App\Http\Controllers\Api\ClientController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('users', [UserController::class,'index'])->name('api.v1.users.index');
Route::post('users',[UserController::class,'store'])->name('api.v1.users');
Route::get('users/{user}', [UserController::class,'show'])->name('api.v1.users.show');
Route::put('users/{user}', [UserController::class,'update'])->name('api.v1.users.update');
Route::delete('users/{user}', [UserController::class,'destroy'])->name('api.v1.users.delete');

Route::get('actividads', [ActividadController::class,'index'])->name('api.v1.actividads.index');
Route::post('actividads', [ActividadController::class,'store'])->name('api.v1.actividads.store');
Route::get('actividads/{actividad}', [ActividadController::class,'show'])->name('api.v1.actividads.show');
Route::put('actividads/{actividad}', [ActividadController::class,'update'])->name('api.v1.actividads.update');
Route::delete('actividads/{actividad}', [ActividadController::class,'destroy'])->name('api.v1.actividads.delete');

Route::get('temas', [TemaController::class,'index'])->name('api.v1.temas.index');
Route::post('temas', [TemaController::class,'store'])->name('api.v1.temas.store');
Route::get('temas/{tema}', [TemaController::class,'show'])->name('api.v1.temas.show');
Route::put('temas/{tema}', [TemaController::class,'update'])->name('api.v1.temas.update');
Route::delete('temas/{tema}', [TemaController::class,'destroy'])->name('api.v1.temas.delete');

Route::get('multimedias', [MultimediaController::class,'index'])->name('api.v1.multimedias.index');
Route::post('multimedias', [MultimediaController::class,'store'])->name('api.v1.multimedias.store');
Route::get('multimedias/{multimedia}', [MultimediaController::class,'show'])->name('api.v1.multimedias.show');
Route::put('multimedias/{multimedia}', [MultimediaController::class,'update'])->name('api.v1.multimedias.update');
Route::delete('multimedias/{multimedia}', [MultimediaController::class,'destroy'])->name('api.v1.multimedias.delete');

Route::get('seccions', [SeccionController::class,'index'])->name('api.v1.seccions.index');
Route::post('seccions', [SeccionController::class,'store'])->name('api.v1.seccions.store');
Route::get('seccions/{seccion}', [SeccionController::class,'show'])->name('api.v1.seccions.show');
Route::put('seccions/{seccion}', [SeccionController::class,'update'])->name('api.v1.seccions.update');
Route::delete('seccions/{seccion}', [SeccionController::class,'destroy'])->name('api.v1.seccions.delete');

Route::get('clients', [ClientController::class,'index'])->name('api.v1.clients.index');
Route::post('clients', [ClientController::class,'store'])->name('api.v1.clients.store');
Route::get('clients/{client}', [ClientController::class,'show'])->name('api.v1.clients.show');
Route::put('clients/{client}', [ClientController::class,'update'])->name('api.v1.clients.update');
Route::delete('clients/{client}', [ClientController::class,'destroy'])->name('api.v1.clients.delete');

Route::get('tipos', [TipoController::class,'index'])->name('api.v1.tipos.index');
Route::post('tipos', [TipoController::class,'store'])->name('api.v1.tipos.store');
Route::get('tipos/{id}', [TipoController::class,'show'])->name('api.v1.tipos.show');
Route::put('tipos/{tipo}', [TipoController::class,'update'])->name('api.v1.tipos.update');
Route::delete('tipos/{tipo}', [TipoController::class,'destroy'])->name('api.v1.tipos.delete');
