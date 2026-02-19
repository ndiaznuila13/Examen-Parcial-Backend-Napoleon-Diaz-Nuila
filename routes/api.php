<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/books', 'App\\Http\\Controllers\\LibroController@index');


Route::post('/loans', 'App\\Http\\Controllers\\LoanController@store');


Route::post('/returns/{loan_id}', 'App\\Http\\Controllers\\ReturnController@store');
