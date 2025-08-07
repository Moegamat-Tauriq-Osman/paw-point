<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

require __DIR__ . '/auth.php';

// Redirect based on role after login
Route::get('/dashboard', function () {
    $user = auth()->user();

    if ($user->role === 'Admin') {
        return redirect()->route('admin.dashboard');
    } elseif ($user->role === 'Staff') {
        return redirect()->route('staff.dashboard');
    } else {
        return redirect()->route('home');
    }
})->middleware(['auth'])->name('dashboard');

// Admin Routes
Route::prefix('admin')->middleware(['auth', 'can:is-admin'])->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Services
    Route::resource('services', ServiceController::class)->except(['show']);

    // Bookings
    Route::get('/bookings', [BookingController::class, 'adminIndex'])->name('bookings.index');
    Route::patch('/bookings/{booking}/accept', [BookingController::class, 'adminAcceptBooking'])->name('bookings.accept');
    Route::put('/bookings/{booking}', [BookingController::class, 'adminUpdate'])->name('bookings.update');
    Route::get('/bookings/{booking}', action: [BookingController::class, 'adminShow'])->name('bookings.show');

    // Staff Management
    Route::get('/staff', [StaffController::class, 'index'])->name('staff.index');
    Route::get('/staff/create', [StaffController::class, 'create'])->name('staff.create');
    Route::post('/staff', [StaffController::class, 'store'])->name('staff.store');
    Route::delete('/staff/{staff}', [StaffController::class, 'destroy'])->name('staff.destroy');
});

// Staff Routes
Route::prefix('staff')->middleware(['auth', 'can:is-staff'])->name('staff.')->group(function () {
    Route::get('/dashboard', [StaffController::class, 'dashboard'])->name('dashboard');

    Route::get('/bookings', [BookingController::class, 'staffIndex'])->name('bookings.index');
    Route::post('/bookings/{booking}/accept', [BookingController::class, 'acceptBooking'])->name('bookings.accept');  // <-- Add this

    Route::get('/bookings/{booking}/edit', [BookingController::class, 'staffEdit'])->name('bookings.edit');
    Route::put('/bookings/{booking}', [BookingController::class, 'staffUpdate'])->name('bookings.update');
});

// User Routes
Route::middleware(['auth', 'can:is-user'])->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');

    Route::resource('bookings', BookingController::class)->only(['index', 'create', 'store']);
    Route::delete('/bookings/{booking}', [BookingController::class, 'userCancel'])->name('bookings.cancel');
    Route::get('/bookings/{booking}', [BookingController::class, 'show'])->name('bookings.show');
    Route::get('/home', [BookingController::class, 'userDashboard'])->name('home');
});

//  Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
