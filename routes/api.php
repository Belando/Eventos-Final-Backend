<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController as Event;
use App\Http\Controllers\AuthController as Auth;
use App\Http\Controllers\HallController as Hall;
use App\Http\Controllers\OrganizerController as Organizer;


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


//Events

Route::get('/events',[Event::class, 'index']);

Route::get('events/name={value}',[Event::class, 'getByName']);  

Route::get('events/type={value}',[Event::class, 'getByType']); 

Route::get('events/{id}',[Event::class, 'getById']); 

Route::post('events',[Event::class, 'store']); 

Route::delete('events/{id}',[Event::class, 'destroy']);

Route::put('events',[Event::class, 'update']);

//Usuarios_auth

Route::post('sign_up',[Auth:: class, 'sign_up']);

Route::post('login',[Auth::class, 'login']);

Route::post('logout',[Auth::class, 'logout']);

//Admin_auth

Route::middleware(['auth:sanctum','solo_usuario_administrador'])->get('users',[Auth::class, 'index']);

Route::middleware(['auth:sanctum','solo_usuario_administrador'])->get('organizers',[Organizer::class, 'index']);

Route::middleware(['auth:sanctum','solo_usuario_administrador'])->get('halls',[Hall::class, 'index']);
