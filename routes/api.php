<?php

use App\Http\Controllers\FrontController;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
//route libere da login

//Route::get('/',[FrontController::class, 'welcome'])->name('welcome');
//Route::get('/categoria/{category}', [FrontController::class, 'categoryShow'])->name('categoryShow');




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
