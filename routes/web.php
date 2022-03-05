<?php

use App\Http\Controllers\CompraController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\ProductoController;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});


Route::group(['middleware' => ['auth','administrador']], function () {
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('producto', ProductoController::class)->except(['show']);
    Route::resource('factura', FacturaController::class)->only(['index', 'show','create','store']);
    Route::resource('compra',CompraController::class)->only('index','store');
});
Route::group(['middleware' => ['auth']], function () {
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('compra',CompraController::class)->only('index','store');
});
require __DIR__ . '/auth.php';
