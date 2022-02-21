<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[PagesController::class,'chollosCargar'])->name("inicio");
Route::post("cholloCrearPost",[HomeController::class,'insertChollo'])->name("insertChollo");
Route::get("/chollo/editar/{id?}",[HomeController::class,'editarChollo'])->name("editarChollo");
Route::view("/login","login")->name("login");
Route::get("/chollo/crear",[HomeController::class,'crearChollo'])->name("crearchollo");
Auth::routes();
Route::post("updatechollo",[HomeController::class,'updateChollo'])->name("updateChollo");
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
