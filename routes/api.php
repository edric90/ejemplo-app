<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\ClientPetController;

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

//Ruta Clientes
Route::controller(ClientController::class)->group(function () 
{
    Route::get("/clients", "index");
    Route::post("/clients","store");
    Route::get("/clients/{clientId}", "show");
    Route::patch("/clients/{clientId}","update");
    Route::delete("/clients/{clientId}","destroy");
});

/*
Route::get("/clients",[ClientController::class,"index"]);
Route::post("/clients",[ClientController::class,"store"]);
Route::get("/clients/{clientId}",[ClientController::class,"show"]);
Route::patch("/clients/{clientId}",[ClientController::class,"update"]);
Route::delete("/clients/{clientId}",[ClientController::class,"destroy"]);
*/

//Ruta Mascotas
Route::controller(PetController::class)->group(function () 
{
    Route::get("/pets","index");
    Route::post("/pets","store");
    Route::get("/pets/{petId}","show");
    Route::patch("/pets/{petId}","update");
    Route::delete("/pets/{petId}","destroy");
});

/*
Route::get("/pets",[PetController::class,"index"]);
Route::post("/pets",[PetController::class,"store"]);
Route::get("/pets/{pet_id}",[PetController::class,"show"]);
Route::patch("/pets/{pet_id}",[PetController::class,"update"]);
Route::delete("/pets/{pet_id}",[PetController::class,"destroy"]);
*/

//Ruta Mascotas-Clientes   Clientes-mascotas
Route::controller(ClientPetController::class)->group(function () 
{
    Route::get("/client-pet","index");
    Route::get("/client-pet/{clientId}","show");

    Route::get("/pet-client","indexinv");
    Route::get("/pet-client/{petId}","showinv");
});

//Route::get("/client-pet",[ClientPetController::class,"index"]);
//Route::get("/client-pet/{clientId}",[ClientPetController::class,"show"]);
