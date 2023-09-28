<?php

use App\Http\Controllers\AccountController as A;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BankController as B;
use App\Http\Controllers\HomeController as H;
use App\Http\Controllers\TransferController as T;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [H::class, 'index'])->name('home');
Route::get('/home', [H::class, 'index'])->name('home');

Route::prefix('banks')->name('banks-')->group(function () {
    Route::get('/', [B::class, 'index'])->name('index')->middleware('role:admin|manager|user'); // all banks
    Route::get('/show/{bank}', [B::class, 'show'])->name('show')->middleware('role:admin|manager|user'); // show one bank

    Route::get('/create', [B::class, 'create'])->name('create')->middleware('role:admin|manager'); // show create form
    Route::get('/edit/{bank}', [B::class, 'edit'])->name('edit')->middleware('role:admin|manager'); // show edit form
    Route::get('/delete/{bank}', [B::class, 'delete'])->name('delete')->middleware('role:admin|manager'); // show delete confirmation

    Route::post('/', [B::class, 'store'])->name('store')->middleware('role:admin|manager'); // store new bank
    Route::put('/{bank}', [B::class, 'update'])->name('update')->middleware('role:admin|manager'); // update existing bank
    Route::delete('/{bank}', [B::class, 'destroy'])->name('destroy')->middleware('role:admin|manager'); // delete existing bank
});

Route::prefix('accounts')->name('accounts-')->group(function () {
    Route::get('/', [A::class, 'index'])->name('index')->middleware('role:admin|manager|user'); // all accounts
    Route::get('/show/{account}', [A::class, 'show'])->name('show')->middleware('role:admin|manager|user'); // show one account

    Route::get('/create', [A::class, 'create'])->name('create')->middleware('role:admin|manager'); // show create form
    Route::get('/edit/{account}', [A::class, 'edit'])->name('edit')->middleware('role:admin|manager'); // show edit form
    Route::get('/delete/{account}', [A::class, 'delete'])->name('delete')->middleware('role:admin|manager'); // show delete confirmation

    Route::post('/', [A::class, 'store'])->name('store')->middleware('role:admin|manager'); // store new account
    Route::put('/{account}', [A::class, 'update'])->name('update')->middleware('role:admin|manager'); // update existing account
    Route::delete('/{account}', [A::class, 'destroy'])->name('destroy')->middleware('role:admin|manager'); // delete existing account
});

Route::prefix('transfers')->name('transfers-')->group(function () {
    Route::get('/', [T::class, 'index'])->name('index')->middleware('role:admin|manager');
    Route::get('/create', [T::class, 'create'])->name('create')->middleware('role:admin|manager'); // show create form
    Route::post('/confirm', [T::class, 'confirm'])->name('confirm')->middleware('role:admin|manager'); // show create form
    Route::post('/', [T::class, 'store'])->name('store')->middleware('role:admin|manager'); // store new account
});


Auth::routes(['register' => false]);
