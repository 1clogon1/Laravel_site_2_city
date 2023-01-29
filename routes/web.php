<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registerController;
use App\Http\Controllers\LoginController;

Route::view('/', 'welcome')->name("welcome");

Route::view('/login', 'login')->name("login");
Route::view('/admin', 'admin')->name("admin");

//Регистрация
//Route::get('/register', [RegistertController::class,'create'])->name("register");
Route::get('/register', [registerController::class,'create'])->middleware('guest')->name('register');//На данную страницу могут войти только не зарегистрированные пользователи ->middleware('guest') при попытке перехода тебя перебросит на домашнюю страницу
Route::post('/register', [registerController::class,'store'])->middleware('guest')->name('register_log');

//Вход в аккаунт
Route::get('/login', [LoginController::class,'create2'])->middleware('guest')->name('login');//На данную страницу могут войти только не зарегистрированные пользователи ->middleware('guest') при попытке перехода тебя перебросит на домашнюю страницу
Route::post('/login', [LoginController::class,'store2'])->middleware('guest');
Route::get('/logout', [LoginController::class,'destroy2'])->middleware('auth')->name('logout');

//Профиль
Route::get('/profile', [ProfileController::class,'create'])->name("profile");
Route::get('/application', [ProfileController::class,'application'])->name("application");
//Route::post('/profile/application', [ProfileController::class,'create_order'])->name("create_order");
Route::post('/profile/application', [ProfileController::class,'create_orders'])->name("create_orders");
Route::post('/profile/category', [ProfileController::class,'create_category'])->name("create_category");
