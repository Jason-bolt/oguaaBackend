<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

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
    return redirect('/login');
});

Route::get('/occupants', [Controller::class, 'index'])->middleware(['auth'])->name('occupants');
Route::get('/data_collection', [Controller::class, 'data_collection'])->middleware(['auth'])->name('data_collection');
Route::post('/data_collection', [Controller::class, 'add_occupant'])->middleware(['auth'])->name('add_occupant');
Route::get('/users', [Controller::class, 'users'])->middleware(['auth'])->name('users');
Route::post('/search', [Controller::class, 'search'])->middleware(['auth'])->name('search');
Route::get('/key_in/{id}/{room_number}', [Controller::class, 'key_in'])->middleware(['auth']);
Route::get('/key_out/{id}/{room_number}', [Controller::class, 'key_out'])->middleware(['auth']);

require __DIR__.'/auth.php';
