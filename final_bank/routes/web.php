<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BankController as B;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('banks')->name('banks-')->group(function () {
    Route::get('/', [B::class, 'index'])->name('index'); // all banks
    Route::get('/show/{bank}', [B::class, 'show'])->name('show'); // show one bank

    Route::get('/create', [B::class, 'create'])->name('create'); // show create form
    Route::get('/edit/{bank}', [B::class, 'edit'])->name('edit'); // show edit form
    Route::get('/delete/{bank}', [B::class, 'delete'])->name('delete'); // show delete confirmation

    Route::post('/', [B::class, 'store'])->name('store'); // store new bank
    Route::put('/{bank}', [B::class, 'update'])->name('update'); // update existing bank
    Route::delete('/{bank}', [B::class, 'destroy'])->name('destroy'); // delete existing bank
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
