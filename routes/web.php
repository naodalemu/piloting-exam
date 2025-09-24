<?php

use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/questions", [QuestionController::class, "index"]);
Route::get("/questions/{question}", [QuestionController::class, "show"]);