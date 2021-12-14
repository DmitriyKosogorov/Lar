<?php

Route::get('/', function () {
    return view('welcome');
});

use Illuminate\Support\Facades\Route;

Route::get('/greeting', function () {return 'Hello World';});

Route::get('/admin', 'TestController@admin')-> name('admin');

Route::get('/main', function () {if(session()->has('registered'))return view('main'); else return view('login');})-> name('main');

Route::get('/login', 'TestController@login')->name('login');

Route::get('/register', function () {return view('register');})->name('register');

Route::post('/try_register', 'TestController@try_register')->name('try_register');

Route::post('/wrong_register', function () {return view('wrong_register');})->name('wrong_register');

Route::get('/wrong_login', function () {return view('wrong_login');})->name('wrong_login');

Route::get('/wrong_admin', function () {return view('wrong_admin');})->name('wrong_admin');

Route::post('/correct_login', 'TestController@correct_login');

Route::get('/', function () {return view('login');});