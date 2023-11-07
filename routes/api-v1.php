<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ActividadController;

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

Route::get('actividads', [ActividadController::class,'index'])->name('api.v1.actividads.index');
Route::post('actividads', [ActividadController::class,'store'])->name('api.v1.actividads.store');
Route::get('actividads/{actividad}', [ActividadController::class,'show'])->name('api.v1.actividads.show');
Route::put('actividads/{actividad}', [ActividadController::class,'update'])->name('api.v1.actividads.update');
Route::delete('actividads/{actividad}', [ActividadController::class,'destroy'])->name('api.v1.actividads.delete');


