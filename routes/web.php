<?php

use App\Http\Controllers\CustomerController;
use App\Models\Customer;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [CustomerController::class, 'index'])->name('index');
Route::get('/add', [CustomerController::class, 'create'])->name('create');
Route::post('/add', [CustomerController::class, 'store']);
Route::get('/edit/{CCode}', [CustomerController::class, 'edit'])->name('edit')->where('CCode', '[A-Za-z0-9]+');
Route::post('/update', [CustomerController::class, 'update']);
Route::get('/delete/{CCode}', [CustomerController::class, 'destroy'])->name('delete')->where('CCode', '[A-Za-z0-9]+');

