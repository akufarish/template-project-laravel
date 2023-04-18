<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get("/dashboard", function () {
    return view("dashboard", [
        "title" => "dashboard"
    ]);
})->middleware("IsLogin");

Route::get("/login", [LoginController::class, "index"])->middleware(["guest"]);
Route::post("/login", [LoginController::class, "DoLogin"]);
Route::get("/register", [RegisterController::class, "index"])->middleware(["guest"]);
Route::post("/register", [RegisterController::class, "DoRegister"]);
Route::post("/logout", [LoginController::class, "DoLogout"]);