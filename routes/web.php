<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    if (auth()->user()->role_id == 1) { // Assuming 1 is Job Seeker
        return redirect()->route('jobseeker.dashboard');
    } elseif (auth()->user()->role_id == 2) { // Assuming 2 is Recruiter
        return redirect()->route('recruiter.dashboard');
    }
    return abort(403, 'Unauthorized'); // Handle unexpected role cases
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/jobseeker-dashboard', function () {
        return view('jobseeker_dashboard');
    })->name('jobseeker.dashboard');

    Route::get('/recruiter-dashboard', function () {
        return view('recruiter_dashboard');
    })->name('recruiter.dashboard');
});

require __DIR__.'/auth.php';
