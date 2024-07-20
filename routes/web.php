<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\MoodController;

Route::get('/moods/data', [MoodController::class, 'getMoodData'])->name('moods.data');
Route::get('/moods/chart', function () {
    return view('moods.chart');
})->name('moods.chart');

Route::resource('moods', MoodController::class)->middleware('auth');




Route::middleware(['auth'])->group(function () {
    Route::resource('notes', NoteController::class);
});

Route::middleware('auth')->group(function () {
    Route::resource('goals', GoalController::class);
});

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);


Route::get('/', function () {
    return view('welcome');
});


Route::get('/account', function () {
    return view('account');
});

