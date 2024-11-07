<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
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
    Route::get("/projects", [AdminProjectController::class, "index"])->name("projects.index");
    Route::get("/projects/create", [AdminProjectController::class, "create"])->name("projects.create");
    Route::post("/projects", [AdminProjectController::class, "store"])->name("projects.store");
    Route::get("/projects/{id}", [AdminProjectController::class, "show"])->name("projects.show");
    Route::get("/projects/{id}/edit", [AdminProjectController::class, "edit"])->name("projects.edit");
    Route::put("/projects/{id}", [AdminProjectController::class, "update"])->name("projects.update");
    Route::delete("/projects/{id}", [AdminProjectController::class, "destroy"])->name("projects.delete");
});
