<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

use Illuminate\Foundation\Inspiring;
Route::get('/inspire', function () {
    return [
        'test'=>"is temp",
        'date'=>date('Y-m-d H:i:s'),
        'quote'=>Inspiring::quotes()->random()
    ];
});

use App\Http\Controllers\Api\MarcaController;
Route::resources([
    'marcas' => MarcaController::class,
]);
use App\Http\Controllers\Api\RegisterController;
Route::controller(RegisterController::class)
->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
});        
Route::middleware('auth:sanctum')->group( function () {
    Route::resources([
        'marcas' => MarcaController::class,
    ]);
});