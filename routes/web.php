<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\EsgController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PrivateController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DonationController;

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::get('/test', function () {
    abort(404);
    // return Inertia::render('Test/Test1');
    // return Inertia::render('Test/Test2');
});


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('about', [AboutController::class, 'index'])->name('about.index');
Route::get('about/ci', [AboutController::class, 'ci'])->name('about.ci');

Route::post('booking/auth', [BookingController::class, 'auth'])->name('booking.auth');
Route::get('booking', [BookingController::class, 'create'])->name('booking.create');
Route::post('booking', [BookingController::class, 'store'])->name('booking.store');
Route::put('booking', [BookingController::class, 'update'])->name('booking.update');
Route::patch('booking', [BookingController::class, 'cancel'])->name('booking.cancel');
Route::get('booking/list', [BookingController::class, 'index'])->name('booking.index');
Route::get('booking/estimate', [BookingController::class, 'estimate'])->name('booking.estimate');

Route::prefix('community')->group(function () {
    Route::get('notice', [BoardController::class, 'notice'])->name('community.notice');
    Route::get('gallery', [BoardController::class, 'gallery'])->name('community.gallery');
    Route::get('newsroom', [BoardController::class, 'newsroom'])->name('community.newsroom');

    // 공통
    Route::get('article/{board}', [BoardController::class, 'show'])->name('community.show');

    Route::get('private', [PrivateController::class, 'index'])->name('community.private');
    Route::get('private/create', [PrivateController::class, 'create'])->name('community.private.create');
    Route::post('private/create', [PrivateController::class, 'store'])->name('community.private.store');
    Route::put('private', [PrivateController::class, 'update'])->name('community.private.update');
    Route::delete('private', [PrivateController::class, 'destroy'])->name('community.private.delete');
    Route::post('private/password', [PrivateController::class, 'password'])->name('community.private.password');
});

Route::get('donation', [DonationController::class, 'index'])->name('donation.index');

Route::get('esg/index', [EsgController::class, 'index'])->name('esg.index');
// Route::get('esg/leader', [EsgController::class, 'leader'])->name('esg.leader');

require __DIR__ . '/auth.php';
