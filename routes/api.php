<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdministrativeRightsController;

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

Route::post('/register', [UserController::class, 'store'])->name('register_api');
Route::get('/register', [UserController::class, 'create']);//->middleware('guest');

Route::post('/login', [UserController::class, 'login'])->name('login_api');

Route::get('/logout', [UserController::class, 'logout']);

Route::get('/client/{id}', [UserController::class, 'show']);//->middleware('auth');

Route::get('/create/room', [AdministrativeRightsController::class, 'create']);
Route::post('/create/room', [AdministrativeRightsController::class, 'store'])->name('create_room_api');
Route::get('rooms', [AdministrativeRightsController::class, 'index']);
Route::get('/room/{id}', [AdministrativeRightsController::class, 'show']);
Route::delete('/room/delete/{id}', [AdministrativeRightsController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
