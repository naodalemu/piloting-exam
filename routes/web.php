<?php

use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuestionSectionController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [QuestionSectionController::class, "index"]);
Route::get('/create_question_section', [QuestionSectionController::class, "create"]);
Route::post('/create_question_section', [QuestionSectionController::class, "store"]);

Route::get("/questions", [QuestionController::class, "index"]);
Route::get("/create_question", [QuestionController::class, "create"]);
Route::post("/create_question", [QuestionController::class, "store"]);
Route::get("/questions/{questionSection}", [QuestionSectionController::class, "show"]);

Route::get("/register", [RegisteredUserController::class, "create"]);
Route::post("/register", [RegisteredUserController::class, "store"]);

Route::get("/login", [SessionController::class, "create"]);
Route::post("/login", [SessionController::class, "store"]);
Route::delete("/logout", [SessionController::class, "destroy"]);

