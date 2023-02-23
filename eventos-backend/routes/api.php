<?php

use App\Models\Event;
use App\Models\Hall;
use App\Models\Organizer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('events',[Event::class, 'index']);

Route::get('events/name={value}',[Event::class, 'getByName']);  

Route::get('events/{id}',[Event::class, 'getById']); 

Route::post('events',[Event::class, 'store']); 

Route::delete('events/{id}',[Event::class, 'destroy']);

Route::put('events',[Event::class, 'update']);

Route::post('books/{event_id}',[Event::class, 'store']);

//Usuarios_auth

Route::post('sign_up',[Auth:: class, 'sign_up']);

Route::post('login',[Auth::class, 'login']);

Route::post('logout',[Auth::class, 'logout']);

//Admin_auth

Route::middleware(['auth:sanctum','solo_usuario_administrador'])->get('users',[User::class, 'index']);

Route::middleware(['auth:sanctum','solo_usuario_administrador'])->get('organizers',[Organizer::class, 'index']);

Route::middleware(['auth:sanctum','solo_usuario_administrador'])->get('halls',[Hall::class, 'index']);
