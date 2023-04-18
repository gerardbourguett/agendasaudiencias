<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('audiencias.index');
})->middleware("auth");

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/audiencia', [App\Http\Controllers\AudienciaController::class, 'index']);
    Route::post('/audiencia/mostrar', [App\Http\Controllers\AudienciaController::class, 'show']);
    Route::post('/audiencia/guardar', [App\Http\Controllers\AudienciaController::class, 'store']);
    Route::post('/audiencia/editar/{id}', [App\Http\Controllers\AudienciaController::class, 'edit']);
    Route::post('/audiencia/actualizar/{audiencia}', [App\Http\Controllers\AudienciaController::class, 'update']);
    Route::post('/audiencia/eliminar/{id}', [App\Http\Controllers\AudienciaController::class, 'destroy']);
});
