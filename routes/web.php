<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminReviewsController;
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

Route::get('/', [PageController::class, 'welcome'])->name('welcome');
Route::get('/about', [PageController::class, 'about'])->name('about');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin', [HomeController::class, 'index'])->middleware(['auth', 'admin'])->name('admin-home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Роуты для работы с "Отзывами"
Route::get('/reviews', [PageController::class, 'reviews'])->name('reviews');
Route::post('/reviews/check', [PageController::class, 'reviews_check']);
Route::get('/reviews/{id}', [PageController::class, 'show_one_reviews'])->name('review-one');


// ==== АДМИНКА =================================================================
Route::get('/admin/reviews', [AdminReviewsController::class, 'index'])->name('admin.reviews');


require __DIR__ . '/auth.php';
