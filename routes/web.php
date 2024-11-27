<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/galerie', function () {
    return view('galerie');
})->name('galerie');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');


Route::get('/account', function() {

        return view('account');
 } )->name('account') ;
    
Route::get('/test', function() {
    return view('test');
})->name('test');

Route::get('register', function() {
    return view('test2');
})->name('test2');

Route::get('dashboard', function() {
    return view('login');
})->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

