<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminReviewsController;
use Illuminate\Support\Facades\Route;

use App\Models\ReviewsModel;
use App\Models\User;

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

// Route::get('/test', function () {
//     $users = new User();
//     $users = $users->all();
//     foreach ($users as $user) {
//         echo 'Имя пользователя: ' . $user->name . '<br>';

//         foreach ($user->reviews as $review) {
//             echo 'отзыв ' . $review->message . '<br>';
//         }
//         echo '--------------------------------------';
//         echo '<br>';
//     }
// });


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

// Роуты для работы с "Поиск"
Route::get('/search', [PageController::class, 'search'])->name('search');
Route::get('/live-search', [PageController::class, 'live_search'])->name('live-search');
Route::post('/search2', [PageController::class, 'live_search_search'])->name('live-search-search');


// ==== АДМИНКА ОТЗЫВЫ =================================================================
Route::get('/admin/reviews', [AdminReviewsController::class, 'index'])->name('admin-reviews');
Route::get('/admin/reviews/{id}/edit', [AdminReviewsController::class, 'edit_review'])->name('admin-reviews-edit');
Route::post('/admin/reviews/{id}/edit-submit', [AdminReviewsController::class, 'edit_review_submit'])->name('admin-reviews-submit');
Route::get('/admin/reviews/{id}/delete', [AdminReviewsController::class, 'delete_review'])->name('admin-reviews-delete');

Route::get('/admin/users', [AdminReviewsController::class, 'show_users'])->name('admin-users');

require __DIR__ . '/auth.php';
