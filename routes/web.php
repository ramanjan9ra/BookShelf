<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ChatbotController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Author routes
Route::resource('authors', AuthorController::class);

// Book routes
Route::resource('books', BookController::class);

// Chatbot API route
Route::post('/chatbot', [ChatbotController::class, 'processQuery']);
