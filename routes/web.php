<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JobseekerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('jobseeker.index');
});

Route::get('/dashboard', function () {
    // Assuming 1 is Job Seeker and 2 is Recruiter
    if (auth()->user()->role_id == 1) { // Job Seeker
        return redirect()->route('jobseeker.dashboard');
    } elseif (auth()->user()->role_id == 2) { // Recruiter
        return redirect()->route('recruiter.dashboard');
    }
    return abort(403, 'Unauthorized'); // Handle unexpected role cases
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Job Seeker Dashboard
    Route::get('/jobseeker-dashboard', function () {
        return view('jobseeker.index');
    })->name('jobseeker.dashboard');

    // Recruiter Dashboard
    Route::get('/recruiter-dashboard', function () {
        return view('jobseeker.index');
    })->name('recruiter.dashboard');
});

require __DIR__.'/auth.php';

Route::get('/contact', function () {
    return view('jobseeker.contact');
})->name('contact');

Route::get('/feedback', function () {
    return view('jobseeker.feedback');
})->name('feedback');

Route::get('/about', function () {
    return view('jobseeker.about');
})->name('about');

Route::get('/applied_jobs', [JobseekerController::class,'applied_jobs'])->name('applied_jobs');
Route::post('/contact/store', [JobseekerController::class, 'store'])->name('contact.store');
Route::get('/available_jobs', [JobseekerController::class, 'available_jobs'])->name('available_jobs');
Route::get('/available_jobs/{id}', [JobseekerController::class, 'available_jobs_details'])->name('available_jobs.details');
Route::post('/job/apply', [JobseekerController::class, 'apply'])->name('job.apply');
Route::post('/feedback/store', [JobseekerController::class, 'feedback_store'])->name('feedback.store')->middleware('auth');
