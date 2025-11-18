<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\NewPasswordController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [UserController::class, 'welcome'])->name('welcome.view');

Route::get('/signin', [SigninController::class, 'signin'])->name('signin.view');
Route::get('/signin/action', [SigninController::class, 'signinaction'])->name('signin.action');

Route::get('/signup', [SignupController::class, 'signup'])->name('signup.view');
Route::get('/signup/action', [SignupController::class, 'signupaction'])->name('signup.action');

Route::get('/forget/password', [ForgetPasswordController::class, 'forgetpassword'])->name('forget.password.view');
Route::get('/forget/password/action', [ForgetPasswordController::class, 'forgetpasswordaction'])->name('forget.password.action');

Route::get('/new/password{token}', [NewPasswordController::class, 'newpassword'])->name('password.reset');
Route::post('/new/password/action', [NewPasswordController::class, 'newpasswordaction'])->name('password.reset.action');

Route::get('/dashboard', [DashboardController::class, 'dashboardview'])->name('dashboard.view');

Route::get('/posts', [PostController::class, 'index']);
Route::post('/posts', [PostController::class, 'store']);
