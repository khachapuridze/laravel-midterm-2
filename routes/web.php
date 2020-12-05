<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\QuestionController;
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

Route::get('/', function () {
    return view('welcome');
});



Route::get('/questions/create',[QuestionController::class,'create'])->name('questions.create')->middleware('auth','admin');;
Route::post('/questions/save',[QuestionController::class,'save'])->name('questions.save') ->middleware('auth','admin');
Route::get('/quizz',[QuestionController::class,'index'])->name('index');
Route::post('/questions/append',[QuestionController::class,'append'])->name('questions.append')->middleware('auth') ;
Route::get('/results',[QuestionController::class,'results'])->name('results') ->middleware('auth');
Route::get('/login',[LoginController::class,'login'])->name('login');
Route::post('/auth',[LoginController::class,'postLogin'])->name('auth');
Route::post('/logout',[LoginController::class,'logout'])->name('logout');
Route::get('/register',[LoginController::class,'register'])->name('register');
Route::post('/adduser',[LoginController::class,'postRegister'])->name('adduser');


