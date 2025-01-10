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
//Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

/*Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/users', [AdminController::class, 'index'])->name('admin.users');
    Route::delete('/admin/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.deleteUser');
    Route::patch('/admin/users/{id}/make-admin', [AdminController::class, 'makeAdmin'])->name('admin.makeAdmin');
});*/




    // Resource routes for categories
    Route::resource('categories', CategoryController::class);

    Route::prefix('admin')->group(function () {
        // Resource route for faqs
        Route::resource('faqs', FaqController::class);
        
        // Resource route for news items (this will automatically handle index, create, store, edit, update, destroy)
        Route::resource('newsitems', NewsController::class);
    });








// Admin Routes


Route::prefix('admin')->name('admin.')->group(function () {
    // Resource route for managing news items
    Route::resource('newsitems', NewsController::class);
});

Route::prefix('admin')->name('admin.')->group(function () {
    // Resource routes for users
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('users', AdminController::class);
});

Route::post('register', [RegisteredUserController::class, 'store']);


Route::get('/contact', [ContactController::class, 'showForm']);
Route::post('/contact', [ContactController::class, 'submitForm']);
// GOEDE ROUTES
Route::get('/home', function () {

    return view('home');

})->name('home');

Route::get('/news', [NewsController::class, 'showUserNews'])->name('news.index');



Route::get('/', function () {
    return view('home');
});

Route::get('/contact', [ContactController::class, 'showContactForm'])->name('contact');
Route::post('/contact', [ContactController::class, 'submitContactForm'])->name('contact.submit');
Route::get('/contact', [FaqController::class, 'view'])->name('faq');


Route::get('/login', function () {
    return view('login');
})->name('login');
Route::get('/user/{username}', [ProfileController::class, 'showPublicProfile']);



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

