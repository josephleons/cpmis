<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HodController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\PasswordChange;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;

// Home route directing to login view
Route::view('/', 'Auth.login');

// LoginController routes
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


// ProjectController
Route::resource('project', ProjectController::class);
Route::get('/project/{id}', [ProjectController::class, 'show'])->name('project.show');
Route::post('/project/{id}', [ProjectController::class, 'update'])->name('project.update');
// routes/web.php
Route::get('/project/report', [ProjectController::class, 'report'])->name('project.report');




// Admin Resource
Route::resource('admin',AdminController::class);

//Facility Resource
Route::resource('facility',FacilityController::class);
Route::get('/comment', [FacilityController::class, 'comment'])->name('facility.comment');

//HOD resource
Route::resource('hod',HodController::class);

Route::resource('comments',CommentController::class);

// Reports controller
Route::resource('reports',ReportController::class);

Route::resource('users',UserController::class);

Route::get('Auth/password', [PasswordChange::class, 'showChangePasswordForm'])->name('Auth.password');
Route::post('Auth/password', [PasswordChange::class, 'updatePassword'])->name('Auth.password');

// Route::middleware(['auth','CheckPasswordChanged'])->group(function(){
//     Route::get('/admin',[AdminController::class,'index'])->name('admin');
// });