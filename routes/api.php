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
use App\Http\Resources\DeskResource;
use App\Models\Desk;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Expr\FuncCall;

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

Route::resource('/users', UserController::class)->name('create','register_api');

Route::post('/login', [UserController::class, 'login']);//->middleware('guest')->name('login_api');

Route::get('/user/{id}', function ($id) {
    return new UserResource(User::find($id));
})->name('profil');//->middleware('auth');

Route::get('/logout', [UserController::class, 'logout']);//->middleware('auth');

Route::resource('/rooms', AdministrativeRightsController::class)->name('create', 'create_room_api');//->middleware('auth')->middleware('admin');;

Route::get('/room/{id}', function ($id) {
    return new RoomResource(Room::find($id));
});//->middleware('auth');

Route::get('/room/desks/{id}', function ($id) {
    return new DeskCollection(Desk::where('room', $id)->get());
});//->middleware('auth');

Route::post('/create/desks', [AdministrativeRightsController::class, 'desks'])->name('create_desks_api');//->middleware('auth')->middleware('admin');
Route::get('/desk/{id}', function ($id) {
    return new DeskResource(Desk::find($id));
});//->middleware('auth');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
