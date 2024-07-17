<?php

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
    dump(base_path());
    return view('welcome');
});

Route::match(['head'],'/app/', function () {
    return '';
});
Route::match(['head'],'/install/', function () {
    return '';
});


