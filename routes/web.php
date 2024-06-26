<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventRegisterationController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SecurityOfficerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisitorCategoryController;
use App\Http\Controllers\VisitorController;
use App\Mail\requestUpdate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\TestimonialController;
use App\Models\EventRegisteration;

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

Route::get('/',[Controller::class,'homePage']);

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
        Route::get('/{visitor}/createPdf',[VisitorController::class,'createPdf'])->name('visitor.createPdf');
        Route::get('/export-visitor',[VisitorController::class,'exportVisitor'])->name('visitor.export');
        Route::get('/{visitor}/entry',[VisitorController::class,'entry'])->name('visitor.entry');
        Route::get('/{visitor}/exit',[VisitorController::class,'exit'])->name('visitor.exit');
    
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
        Route::get('/export-securityOfficer',[SecurityOfficerController::class,'export'])->name('employee.export');

    });
    Route::group(["prefix"=>'role'],function () {
        Route::get('/create',[RoleController::class,'create'])->name('role.create');
        Route::post('/store',[RoleController::class,'store'])->name('role.store');
        Route::get('/list',[RoleController::class,'index'])->name('role.index');
        // Route::post('/ajax',[RoleController::class,'ajax'])->name('role.ajax');
        Route::get('/{role}/show',[RoleController::class,'show'])->name('role.show');
        Route::get('/{role}/edit',[RoleController::class,'edit'])->name('role.edit');
        Route::put('/{role}/update',[RoleController::class,'update'])->name('role.update');
        Route::get('/{role}/delete',[RoleController::class,'delete'])->name('role.delete');
    });
    Route::group(["prefix"=>'category'],function () {
        Route::get('/create',[VisitorCategoryController::class,'create'])->name('visitorCategory.create');
        Route::post('/store',[VisitorCategoryController::class,'store'])->name('visitorCategory.store');
        Route::get('/list',[VisitorCategoryController::class,'index'])->name('visitorCategory.index');
        Route::get('/{visitorCategory}/edit',[VisitorCategoryController::class,'edit'])->name('visitorCategory.edit');
        Route::put('/{visitorCategory}/update',[VisitorCategoryController::class,'update'])->name('visitorCategory.update');
        Route::get('/{visitorCategory}/delete',[VisitorCategoryController::class,'delete'])->name('visitorCategory.delete');
    });
    Route::group(["prefix"=>'department'],function () {
        Route::get('/create',[DepartmentController::class,'create'])->name('department.create');
        Route::post('/store',[DepartmentController::class,'store'])->name('department.store');
        Route::get('/list',[DepartmentController::class,'index'])->name('department.index');
        Route::get('/{department}/edit',[DepartmentController::class,'edit'])->name('department.edit');
        Route::put('/{department}/update',[DepartmentController::class,'update'])->name('department.update');
        Route::get('/{department}/delete',[DepartmentController::class,'delete'])->name('department.delete');
    });
    Route::group(["prefix"=>'permission'],function () {
        Route::get('/create',[PermissionController::class,'create'])->name('permission.create');
        Route::post('/store',[PermissionController::class,'store'])->name('permission.store');
        Route::get('/list',[PermissionController::class,'index'])->name('permission.index');
        Route::get('/{permission}/edit',[PermissionController::class,'edit'])->name('permission.edit');
        Route::put('/{permission}/update',[PermissionController::class,'update'])->name('permission.update');
        Route::get('/{permission}/delete',[PermissionController::class,'delete'])->name('permission.delete');
    });
    Route::group(["prefix"=>'event'],function () {
        Route::get('/create',[EventController::class,'create'])->name('event.create');
        Route::post('/store',[EventController::class,'store'])->name('event.store');
        Route::get('/list',[EventController::class,'index'])->name('event.index');
        Route::post('/ajax',[EventController::class,'ajax'])->name('event.ajax');
        Route::get('/{event}/show',[EventController::class,'show'])->name('event.show');
        Route::get('/{event}/edit',[EventController::class,'edit'])->name('event.edit');
        Route::put('/{event}/update',[EventController::class,'update'])->name('event.update');
        Route::get('/{event}/delete',[EventController::class,'delete'])->name('event.delete');
        Route::get('/{event}/eventRegisteration',[EventController::class,'eventRegisteration'])->name('event.eventRegisteration');
    });
    Route::group(["prefix"=>'testimonial'],function () {
        Route::get('/create',[TestimonialController::class,'create'])->name('testimonial.create');
        Route::post('/store',[TestimonialController::class,'store'])->name('testimonial.store');
        Route::get('/list',[TestimonialController::class,'index'])->name('testimonial.index');
        Route::post('/ajax',[TestimonialController::class,'ajax'])->name('testimonial.ajax');
        Route::get('/{testimonial}/show',[TestimonialController::class,'show'])->name('testimonial.show');
        Route::get('/{testimonial}/edit',[TestimonialController::class,'edit'])->name('testimonial.edit');
        Route::put('/{testimonial}/update',[TestimonialController::class,'update'])->name('testimonial.update');
        Route::get('/{testimonial}/delete',[TestimonialController::class,'delete'])->name('testimonial.delete');
    });
    Route::group(["prefix"=>'eventRegisteration'],function () {
        Route::post('/store', [EventRegisterationController::class, 'store'])->name('eventRegisteration.store');
        Route::get('/list',[EventRegisterationController::class,'index'])->name('eventRegisteration.index');
        Route::post('/ajax',[EventRegisterationController::class,'ajax'])->name('eventRegisteration.ajax');
        Route::get('/{eventRegisteration}/show',[EventRegisterationController::class,'show'])->name('eventRegisteration.show');
        Route::get('/{eventRegisteration}/edit',[EventRegisterationController::class,'edit'])->name('eventRegisteration.edit');
        Route::put('/{eventRegisteration}/update',[EventRegisterationController::class,'update'])->name('eventRegisteration.update');
        Route::get('/{eventRegisteration}/delete',[EventRegisterationController::class,'delete'])->name('eventRegisteration.delete');
        Route::get('/{eventRegisteration}/approve',[EventRegisterationController::class,'approve'])->name('eventRegisteration.approve');
        Route::get('/{eventRegisteration}/reject',[EventRegisterationController::class,'reject'])->name('eventRegisteration.reject');
        Route::get('/{eventRegisteration}/entry',[EventRegisterationController::class,'entry'])->name('eventRegisteration.entry');
        Route::get('/{eventRegisteration}/exit',[EventRegisterationController::class,'exit'])->name('eventRegisteration.exit');
    });
    Route::get('/applications',[UserController::class,'userApplications'])->name('user.application');
    Route::get('/eventApplications',[UserController::class,'eventApplications'])->name('user.eventApplications');
    Route::get('/events',[UserController::class,'eventData'])->name('events');
});

