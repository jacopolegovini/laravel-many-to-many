<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TaskController as AdminTaskController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WelcomeController;

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

Route::get('/', [WelcomeController::class, 'index'])->name('welcome.index');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware("auth")->prefix("/admin")->name("admin.")->group(function () {
    Route::get("/tasks", [AdminTaskController::class, "index"])->name("tasks.index");
    Route::get("/tasks/create", [AdminTaskController::class, "create"])->name("tasks.create");
    Route::post("/tasks", [AdminTaskController::class, "store"])->name("tasks.store");
    Route::get("/tasks/{id}", [AdminTaskController::class, "show"])->name("tasks.show");
    Route::get("/tasks/{id}/edit", [AdminTaskController::class, "edit"])->name("tasks.edit");
    Route::put("/tasks/{id}", [AdminTaskController::class, "update"])->name("tasks.update");
    Route::delete("/tasks/{id}", [AdminTaskController::class, "destroy"])->name("tasks.delete");
});