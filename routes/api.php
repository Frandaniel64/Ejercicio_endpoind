<?php

use App\Http\Controllers\api\usersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\filesController;


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
/* 
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */

// Se crearon los Endonint de las rutas de la API.


Route::apiResources([
    //Users  api/users (Muestra todos los Usuarios con sus archivos )
    //Users  api/users/{id} (Muestra un Usuario con sus archivos )
    'users' => usersController::class,

    
    /* api/file en Post (Cargar un archivo con los atributos user_id y file) y en respuesta devuelve el usuario 
    con el ultimo archivo cargado y los demas archivos asignados a ese usuario */
    
    'file' =>  filesController::class,
]);

