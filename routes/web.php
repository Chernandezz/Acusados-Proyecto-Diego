<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AcusadoController;
use App\Http\Controllers\AcusacionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::resource('acusados',AcusadoController::class);

Route::get('/acusaciones/{cedulaAcusado}', [AcusacionController::class,'index']);
Route::get('/acusaciones/{cedulaAcusado}/create', [AcusacionController::class,'create']);
Route::post('/acusaciones', [AcusacionController::class,'store']);
Route::get('/acusaciones/juzgar/{cedulaAcusado}', [AcusacionController::class,'juzgar']);


