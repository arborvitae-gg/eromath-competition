<?php

use App\Http\Controllers\QuestionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::apiResource('questions', QuestionController::class);





// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
