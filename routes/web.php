<?php

use App\Http\Controllers\VisitorController;
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

Route::get('/', function () {
    return view('admin.index');
})->name('dashboard');
Route::get('/create',[VisitorController::class,'create'])->name('visitor.create');
Route::post('/store',[VisitorController::class,'store'])->name('visitor.store');
Route::get('/list',[VisitorController::class,'index'])->name('visitor.index');
Route::post('/ajax',[VisitorController::class,'ajax'])->name('visitor.ajax');
Route::get('/{visitor}/show',[VisitorController::class,'show'])->name('visitor.show');
Route::get('/{visitor}/edit',[VisitorController::class,'edit'])->name('visitor.edit');
Route::put('/{visitor}/update',[VisitorController::class,'update'])->name('visitor.update');
Route::get('/{visitor}/delete',[VisitorController::class,'delete'])->name('visitor.delete');

