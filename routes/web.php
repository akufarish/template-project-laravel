<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MuridController;
use App\Http\Controllers\RegisterController;
use App\Models\Murid;
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
    return redirect("/login");
});


Route::get("/dashboard", [MuridController::class, "show"])->middleware("IsLogin");
Route::get("/login", [LoginController::class, "index"])->middleware(["guest"]);
Route::post("/login", [LoginController::class, "DoLogin"]);
Route::get("/register", [RegisterController::class, "index"])->middleware(["guest"]);
Route::post("/register", [RegisterController::class, "DoRegister"]);
Route::post("/logout", [LoginController::class, "DoLogout"]);
Route::get("/tambah", [MuridController::class, "create"])->middleware("IsLogin");
Route::post("/tambah", [MuridController::class, "store"]);
Route::get("hapus/{murid:id}", [MuridController::class, "destroy"])->middleware("IsLogin");
Route::get("/ubah/{murid:id}", [MuridController::class, "edit"])->middleware("IsLogin");
Route::post("/ubah", [MuridController::class, "update"]);