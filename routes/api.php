<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdministrativeRightsController;
use App\Http\Resources\RoomCollection;
use App\Http\Resources\RoomResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Models\Room;
use App\Http\Resources\DeskCollection;
use App\Models\Desk;

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

Route::post('/register', [UserController::class, 'store'])->name('register_api');//->middleware('guest');
Route::get('/register', [UserController::class, 'create']);//->middleware('guest');

Route::post('/login', [UserController::class, 'login']);//->middleware('guest')->name('login_api');

Route::get('/profil/{id}', function ($id) {
    return new UserResource(User::find($id));
})->name('profil');//->middleware('auth');

Route::get('/logout', [UserController::class, 'logout']);//->middleware('auth');


Route::get('/client/{id}', [UserController::class, 'show']);//->middleware('auth')->middleware('admin');

Route::get('/create/room', [AdministrativeRightsController::class, 'create']);//->middleware('auth')->middleware('admin');
Route::post('/create/room', [AdministrativeRightsController::class, 'store'])->name('create_room_api');//->middleware('auth')->middleware('admin');


Route::get('/rooms', function () {
    return new RoomResource(Room::all());
});//->middleware('auth');

Route::get('/room/{id}', [AdministrativeRightsController::class, 'show']);//->middleware('auth')->middleware('admin');

Route::get('/room/{id}', function ($id) {
    return new DeskCollection(Desk::where('room', $id)->get());
});

Route::delete('/room/delete/{id}', [AdministrativeRightsController::class, 'destroy'])->middleware('auth')->middleware('admin');

Route::post('/create/desks', [AdministrativeRightsController::class, 'desks'])->name('create_desks_api');//->middleware('auth')->middleware('admin');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
