<?php

use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuestionSectionController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [QuestionSectionController::class, "index"]);
Route::get('/create_question_section', [QuestionSectionController::class, "create"])->middleware("auth");
Route::post('/create_question_section', [QuestionSectionController::class, "store"])->middleware("auth");

Route::get("/questions", [QuestionController::class, "index"]);
Route::get("/create_question", [QuestionController::class, "create"])->middleware("auth");
Route::post("/create_question", [QuestionController::class, "store"])->middleware("auth");
Route::get("/questions/{questionSection}", [QuestionSectionController::class, "show"])->middleware("auth");

Route::get("/register", [RegisteredUserController::class, "create"])->middleware("guest");
Route::post("/register", [RegisteredUserController::class, "store"])->middleware("guest");

Route::get("/login", [SessionController::class, "create"])->middleware("guest");
Route::post("/login", [SessionController::class, "store"])->middleware("guest");
Route::delete("/logout", [SessionController::class, "destroy"])->middleware("auth");

