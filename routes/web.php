<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pagesController;

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/',[pagesController::class,'welcomepage'])->name('Welcome Page');
Route::get('/login',[pagesController::class,'login'])->name('login');
Route::post('/login',[pagesController::class,'loginValidation'])->name('login.validation');
Route::get('/register',[pagesController::class,'register'])->name('registration');
Route::post('/register',[pagesController::class,'registerValidation'])->name('registration.validation');
Route::get('/dashboard',[pagescontroller::class,'dashboard'])->name('dashboard');
Route::get('/user/details/{id}',[pagesController::class,'showdetail'])->name('user.details');
Route::get('/user/showDetails',[pagesController::class,'showdetail'])->name('user.showDetails');
Route::get('/customer/all',[pagescontroller::class,'details'])->name('customer.details');
