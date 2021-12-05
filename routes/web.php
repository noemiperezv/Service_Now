<?php

use Illuminate\Support\Facades\Route;






Route::get('/', [App\Http\Controllers\UsuarioController::class,'index']);

Route::post('/EnvioTarea', [App\Http\Controllers\UsuarioController::class,'EnvioTarea']);

Route::post('/EnvioProyecto', [App\Http\Controllers\UsuarioController::class,'EnvioProyecto']);

