<?php

use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuestionSectionController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [QuestionSectionController::class, "index"]);
Route::middleware("admin")->group(function () {
    Route::get('/create_question_section', [QuestionSectionController::class, "create"]);
    Route::post('/create_question_section', [QuestionSectionController::class, "store"]);
    Route::get("/create_question", [QuestionController::class, "create"]);
    Route::post("/create_question", [QuestionController::class, "store"]);
});

Route::get("/questions", [QuestionController::class, "index"]);
Route::get("/questions/{questionSection}", [QuestionSectionController::class, "show"]);

Route::get("/register", [RegisteredUserController::class, "create"])->middleware("guest");
Route::post("/register", [RegisteredUserController::class, "store"])->middleware("guest");

Route::get("/login", [SessionController::class, "create"])->middleware("guest")->name("login");
Route::post("/login", [SessionController::class, "store"])->middleware("guest");
Route::delete("/logout", [SessionController::class, "destroy"])->middleware("auth");

