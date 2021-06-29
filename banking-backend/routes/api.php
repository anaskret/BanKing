<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\TransferController;
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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
  //  return $request->user();
//});

Route::post('register',[UserController::class,'register']);

Route::post('login',[UserController::class,'login']);

Route::get('showUsers',[UserController::class,'showUsers']);


// WYKORZYSTANIE AUTORYZACJI
Route::middleware('auth:sanctum')->group( function () {

    Route::post('logout',[UserController::class,'logout']);

    Route::post('addTransfer',[TransferController::class,'addTransfer']);

    Route::get('showTransfers',[TransferController::class,'showTransfers']);

    Route::get('showAccount',[AccountController::class,'showAccount']);
   
    Route::put('updatePassword',[AccountController::class,'updatePassword']);
});