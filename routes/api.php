<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\ClientsApisController;

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

Route::post('/auth/register', [AuthApiController::class, 'create_user']);
Route::post('/auth/login', [AuthApiController::class, 'login_user']);
// Route::post('/auth/logout', [AuthApiController::class, 'logout'])->name('logout');
Route::get('/clientsapi/search_client/{name}',[ClientsApisController::class,'search_client']);



Route::group(['middleware' => ['auth:sanctum']], function() {

    Route::resource('/clientsapi',ClientsApisController::class);
    
   
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
