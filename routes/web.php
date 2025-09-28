<?php

use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuestionSectionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [QuestionSectionController::class, "index"]);
Route::get('/create_question_section', [QuestionSectionController::class, "create"]);
Route::post('/create_question_section', [QuestionSectionController::class, "store"]);

Route::get("/questions", [QuestionController::class, "index"]);
Route::get("/create_question", [QuestionController::class, "create"]);
Route::post("/create_question", [QuestionController::class, "store"]);
Route::get("/questions/{questionSection}", [QuestionSectionController::class, "show"]);

