<?php
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/users', [AdminController::class, 'index'])->name('admin.users');
    Route::delete('/admin/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.deleteUser');
    Route::patch('/admin/users/{id}/make-admin', [AdminController::class, 'makeAdmin'])->name('admin.makeAdmin');
});
// GOEDE ROUTES
Route::get('/home', function () {

    return view('home');

})->name('home');

Route::get('/news', [NewsController::class, 'index'])->name('news');

Route::get('/', function () {
    return view('home');
});

Route::get('/contact', [ContactController::class, 'showContactForm'])->name('contact');
Route::post('/contact', [ContactController::class, 'submitContactForm'])->name('contact.submit');

Route::get('/login', function () {
    return view('login');
})->name('login');
Route::get('/user/{username}', [ProfileController::class, 'showPublicProfile']);

Route::get('/galerie', function () {
    return view('galerie');
})->name('galerie');

Route::get('/account', [AccountController::class, 'showProfile'])->middleware('auth');
    
Route::get('/register', function () {
    return view('register');
})->name('register');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';

