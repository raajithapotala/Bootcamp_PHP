<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

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
Route::post('/users',[UsersController::class, 'createUser']);
Route::get('/users',[UsersController::class, 'fetchAllUsers']);
Route::get('/users/name/{username}',[UsersController::class,'fetchUserByName']);
Route::get('/users/num/{contactNumber}',[UsersController::class,'fetchUserByContactNo']);
Route::get('/users/email/{email}',[UsersController::class,'fetchUsersByEmail']);
Route::delete('/users/name/{username}',[UsersController::class,'deleteUserByName']);
Route::delete('/users/email/{email}',[UsersController::class,'deleteUserByEmail']);
Route::delete('/users/num/{contactNumber}',[UsersController::class,'deleteUserBycontactNo']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
