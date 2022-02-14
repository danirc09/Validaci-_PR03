<?php

use App\Http\Controllers\AnimalController;
use Illuminate\Support\Facades\Route;
use App\Models\Animal;

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

Route::get('/index',[AnimalController::class, 'index']);

Route::get('/crearAnimal',[AnimalController::class, 'crearAnimal']);

Route::post('/crearAnimalPost',[AnimalController::class, 'crearAnimalPost']);

Route::get('/eliminarAnimal/{id}', [AnimalController::class, 'eliminarAnimal']);

Route::post('leer',[AnimalController::class, 'leerController']);