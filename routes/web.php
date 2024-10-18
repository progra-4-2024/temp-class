<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('mis-views/segunda-view');
});
Route::get('/mapa', function () {
    return view('mis-views/mapa');
});
use App\Http\Controllers\PrimerController;
//Route::get('/mi-primer-controller', [PrimerController::class, 'index']);
Route::any('/mi-primer-controller/{texto?}', [PrimerController::class, 'show'])
->where(['texto' => '[a-z0-9-]+'])
->name('mi-controller');
Route::redirect('/here', '/there');

use App\Http\Controllers\ContactoController;
Route::get('/contacto', [ContactoController::class, 'index']);
Route::post('/contacto', [ContactoController::class, 'send']);
Route::get('/contactado', [ContactoController::class, 'contacted'])->name('contactado');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/ejemplo-api', function(){
    $servidor = 'http://temp.localhost/api/';
    $client = new GuzzleHttp\Client(['base_uri' => $servidor]);
    $response = $client->request('GET', 'marcas/1');
    $contents = $response->getBody()->getContents();
    $as_array = json_decode($contents);
    return $as_array;
});
