<?php

use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuestionSectionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [QuestionSectionController::class, "index"]);

Route::get("/questions", [QuestionController::class, "index"]);
Route::get("/questions/{questionSection}", [QuestionSectionController::class, "show"]);