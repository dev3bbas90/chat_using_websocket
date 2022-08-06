<?php

use App\Models\User;
use BeyondCode\LaravelWebSockets\Facades\WebSocketsRouter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Socket & Chatify
|--------------------------------------------------------------------------
|
| https://beyondco.de/docs/laravel-websockets/basic-usage/pusher
| https://chatify.munafio.com/
|
| change usher in these files
|
| config >>
| broadcasting , chatify >> ws config
| public/app js >> ws config
| resources bootstrap.js
| resources views vendor chatify layouts footer >> ws config
|>> change message root in message file
| message >> image root
|
*/

Route::get('/', function () {
    // Auth::login(User::find(rand(1,2)));
    // dd(Auth::user());
    return view('welcome');
});

// WebSocketsRouter::webSocket('/my-websocket', \App\MyCustomWebSocketHandler::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
