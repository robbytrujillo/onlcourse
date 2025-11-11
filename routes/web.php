<?php

use App\Models\Course;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubscribeTransactionController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FrontController::class, 'index'])->name('front.index');

// domain.com/details/detail-class
Route::get('/details/{course:slug}', [FrontController::class, 'details'])->name('front.details');

Route::get('/category/{category:slug}', [FrontController::class, 'category'])->name('front.category');

Route::get('/pricing', [FrontController::class, 'pricing'])->name('front.pricing');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // must logged in before create a transaction
    Route::get('/checkout', [FrontController::class, 'checkout'])->name('front.checkout');
    
    Route::post('/checkout/store', [FrontController::class, 'checkout_store'])->name('front.checkout.store');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('categories', CategoryController::class)
        ->middleware('role:owner'); // admin.categories.index
        
        Route::resource('teachers', TeacherController::class)
        ->middleware('role:owner'); // admin.categories.index
        
        Route::resource('courses', CourseController::class)
        ->middleware('role:owner|teacher'); // admin.categories.index
        
        Route::resource('subscribe_transactions', SubscribeTransactionController::class)
        ->middleware('role:owner'); // admin.categories.index
        
        Route::resource('course_videos', SubscribeTransactionController::class)
        ->middleware('role:owner|teacher'); // admin.categories.index
    });
});

require __DIR__.'/auth.php';