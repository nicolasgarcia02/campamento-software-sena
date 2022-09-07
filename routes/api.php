<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BootcampController;
use App\Http\Controllers\CourseController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//Primera ruta REST
Route::get('/prueba',function(){
    echo "Hola";
});

//vincular el controlador bootcamp a sus respectivas rutas
Route::apiResource('bootcamps' ,  BootcampController::class);
Route::apiResource('courses' ,  CourseController::class);