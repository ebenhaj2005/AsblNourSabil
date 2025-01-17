<?php
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\CategoryController;
use App\Http\Middleware\AdminMiddleware;

//Admin routes
Route::get('/', function () {
    return view('home');
});


Route::middleware([AdminMiddleware::class])->prefix('admin')->name('admin.')->group(function () {
Route::resource('newsitems', NewsController::class);
Route::resource('users', AdminController::class);
Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');
Route::get('/faq/create', [FaqController::class, 'create'])->name('faq.create'); 
Route::post('/faq', [FaqController::class, 'store'])->name('faq.store');
Route::get('/faq/{id}/edit', [FaqController::class, 'edit'])->name('faq.edit'); 
Route::put('/faq/{faq}', [FaqController::class, 'update'])->name('faq.update');
Route::delete('/faq/{faq}', [FaqController::class, 'destroy'])->name('faq.destroy'); 
Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
Route::resource('categories', CategoryController::class);
Route::get('/newsitems/{newsItem}/edit', [NewsController::class, 'edit'])->name('newsitems.edit');
Route::put('/newsitems/{newsItem}', [NewsController::class, 'update'])->name('newsitems.update');
Route::delete('/newsitems/{newsItem}', [NewsController::class, 'destroy'])->name('newsitems.destroy');
});
   
 
//User routes
Route::middleware('auth')->group(function () {
Route::get('/account', [AccountController::class, 'showProfile'])->name('account.showProfile');
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

//Public routes
Route::post('register', [RegisteredUserController::class, 'store']);
Route::get('/contact', [ContactController::class, 'showForm']);
Route::post('/contact', [ContactController::class, 'submitForm']);
Route::get('/news', [NewsController::class, 'showUserNews'])->name('news.index');
Route::get('/contact', [ContactController::class, 'showContactForm'])->name('contact');
Route::post('/contact', [ContactController::class, 'submitContactForm'])->name('contact.submit');
Route::get('/contact', [FaqController::class, 'view'])->name('faq');
Route::get('/user/{username}', [ProfileController::class, 'showPublicProfile']);
Route::get('/home', [ProfileController::class, 'home']) ->name('home');
Route::get('/register', [ProfileController::class, 'register'])     ->name('register');
Route::get('/login', [ProfileController::class, 'login'])     ->name('login');
// GOEDE ROUTES















    


Route::middleware('auth')->group(function () {
   

});



require __DIR__.'/auth.php';

