<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\SocialController;
use App\Http\Controllers\Api\RegisterController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




Route::group(['prefix' => 'users', 'as' => 'user.','middleware'=>'cors'], function () {
    Route::POST('/{referalSign?}',[RegisterController::class,'store'])->name('store');
    Route::options('/{referalSign?}',[RegisterController::class,'store'])->name('store');
    Route::GET('/', [UserController::class, 'getUsers']);

});

Route::options('test', [UserController::class,'test'] );


