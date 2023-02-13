<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SocialController;

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
Route::get('/{any}', function ()
{
    return view('index');
})->where('any','^(?!api).*$');
// Route::GET('/facebook', [SocialController::class, 'callback']);
// Route::GET('/redirect', [SocialController::class, 'redirect']);
