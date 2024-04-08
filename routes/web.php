<?php

use App\Http\Controllers\RoleController;
use App\Http\Controllers\SecurityOfficerController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware'=>'auth'],function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
    Route::group(["prefix"=>'visitor'],function(){
        Route::get('/create',[VisitorController::class,'create'])->name('visitor.create');
        Route::post('/store',[VisitorController::class,'store'])->name('visitor.store');
        Route::get('/list',[VisitorController::class,'index'])->name('visitor.index');
        Route::post('/ajax',[VisitorController::class,'ajax'])->name('visitor.ajax');
        Route::get('/{visitor}/show',[VisitorController::class,'show'])->name('visitor.show');
        Route::get('/{visitor}/edit',[VisitorController::class,'edit'])->name('visitor.edit');
        Route::put('/{visitor}/update',[VisitorController::class,'update'])->name('visitor.update');
        Route::get('/{visitor}/delete',[VisitorController::class,'delete'])->name('visitor.delete');
        Route::get('/{visitor}/approve',[VisitorController::class,'approve'])->name('visitor.approve');
        Route::get('/{visitor}/reject',[VisitorController::class,'reject'])->name('visitor.reject');
        Route::get('/createPdf',[VisitorController::class,'createPdf'])->name('visitor.createPdf');
    
    });
    Route::group(["prefix"=>'empoylee'],function () {
        Route::get('/create',[SecurityOfficerController::class,'create'])->name('empoylee.create');
        Route::post('/store',[SecurityOfficerController::class,'store'])->name('empoylee.store');
        Route::get('/list',[SecurityOfficerController::class,'index'])->name('empoylee.index');
        Route::post('/ajax',[SecurityOfficerController::class,'ajax'])->name('empoylee.ajax');
        Route::get('/{securityOfficer}/show',[SecurityOfficerController::class,'show'])->name('empoylee.show');
        Route::get('/{securityOfficer}/edit',[SecurityOfficerController::class,'edit'])->name('employee.edit');
        Route::put('/{securityOfficer}/update',[SecurityOfficerController::class,'update'])->name('empoylee.update');
        Route::get('/{securityOfficer}/delete',[SecurityOfficerController::class,'delete'])->name('empoylee.delete');
    });
    Route::group(["prefix"=>'role'],function () {
        Route::get('/create',[RoleController::class,'create'])->name('role.create');
        Route::post('/store',[RoleController::class,'store'])->name('role.store');
        // Route::get('/list',[RoleController::class,'index'])->name('role.index');
        // Route::post('/ajax',[RoleController::class,'ajax'])->name('role.ajax');
        // Route::get('/{role}/show',[RoleController::class,'show'])->name('role.show');
        // Route::get('/{role}/edit',[RoleController::class,'edit'])->name('role.edit');
        // Route::put('/{role}/update',[RoleController::class,'update'])->name('role.update');
        // Route::get('/{role}/delete',[RoleController::class,'delete'])->name('role.delete');
    });
});

