<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\TempatKulinerController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\EditController;
use App\Http\Controllers\KulinerAdminController;
use App\Http\Controllers\ReviewAdminController;
use App\Http\Controllers\UserAdminController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\VerifyEmailController;



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

Route::get('/', function () {
    return redirect('login');
});

Route::get('/dashboard', function () {
    if (Auth::check()) {
        // Cek role user
        if (Auth::user()->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('user.dashboard');
        }
    }
    return redirect()->route('login');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.update');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])->name('verification.notice');
    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
        ->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')->name('verification.send');
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth'])->group(function () {
    // Dashboard untuk Pengguna
    Route::get('/user/dashboard', [UserDashboardController::class, 'index'])->name('user.index')->middleware('role:user');

    // Dashboard untuk Admin
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard')->middleware('role:admin');
});

Route::get('/upload-tempat-kuliner', [UploadController::class, 'create'])->name('user.create');
Route::post('/upload-tempat-kuliner', [UploadController::class, 'store'])->name('user.store');
Route::get('/dashboard', [UploadController::class, 'dashboard'])->name('user.dashboard');

Route::get('/kuliner/{id}', [TempatKulinerController::class, 'show'])->name('kuliner.show');

// Define the route for submitting reviews
Route::post('/review/{uploadId}/store', [ReviewController::class, 'store'])->name('review.store');

Route::get('/profil', [PenggunaController::class, 'profil'])->name('user.profil')->middleware('auth');
// routes/web.php
Route::get('/user/{id}', [PenggunaController::class, 'show'])->name('user.show');
Route::delete('/user/upload/{id}', [PenggunaController::class, 'destroy'])->name('user.upload.delete');
Route::get('/dashboard', [PenggunaController::class, 'dashboard'])->name('user.dashboard');

// Routes untuk tempat kuliner
Route::middleware('auth')->group(function () {
    // Menampilkan halaman edit tempat kuliner
    Route::get('/kuliner/{id}/edit', [EditController::class, 'edit'])->name('user.edit');

    // Memperbarui tempat kuliner
    Route::put('/kuliner/{id}', [EditController::class, 'update'])->name('user.update');
});
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/user', [AdminDashboardController::class, 'users'])->name('admin.user');
});

// Menampilkan semua user
Route::get('/admin/user', [UserAdminController::class, 'index'])->name('admin.user');

// Halaman edit user
Route::get('/admin/user/edit/{id}', [UserAdminController::class, 'edit'])->name('admin.Edit');

// Route untuk proses update
Route::put('/admin/user/update/{id}', [UserAdminController::class, 'update'])->name('admin.user.update');

// Route untuk menghapus user
Route::delete('/admin/user/destroy/{id}', [UserAdminController::class, 'destroy'])->name('admin.user.destroy');

// Route untuk create user
Route::get('/admin/create', [UserAdminController::class, 'create'])->name('admin.create');
Route::post('/admin/user', [UserAdminController::class, 'store'])->name('admin.user.store');


Route::get('/admin/kuliner', [KulinerAdminController::class, 'index'])->name('admin.kuliner');
// Tambahkan route untuk menghapus kuliner
Route::delete('/admin/kuliner/{id}', [KulinerAdminController::class, 'destroy'])->name('admin.kuliner.destroy');

// routes/web.php
Route::get('/admin/review', [ReviewAdminController::class, 'index'])->name('admin.review');
Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');


require __DIR__.'/auth.php';
