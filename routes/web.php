<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

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
    return view('welcome');
});

//Route::get('clients',[ClientController::class,'indexview'])->name('clients.indexview');
//Route::get('clients/{IdClient}',[ClientController::class,'showview'])->name('clients.showview');

Route::controller(ClientController::class)->group(function () 
{
    Route::get("/clients", "indexview")->name('clients.indexview');
    Route::get("/clients/{clientId}", "showview")->name('clients.showview');
});