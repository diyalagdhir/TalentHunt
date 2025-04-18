<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\JobseekerController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\InterviewController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use App\Models\State;
use App\Models\City;

Route::get('/', [JobseekerController::class, 'index'])->name('index');
Route::get('/about', [JobseekerController::class, 'about'])->name('about');
Route::get('/contact', [JobseekerController::class, 'contact'])->name('contact');
Route::get('/feedback', [JobseekerController::class, 'feedback'])->name('feedback');


//-------Jobseeker URL's--------//

Route::get('/applied_jobs', [JobseekerController::class,'applied_jobs'])->name('applied_jobs');
Route::post('/contact/store', [JobseekerController::class, 'store'])->name('contact.store');
Route::get('/available_jobs', [JobseekerController::class, 'available_jobs'])->name('available_jobs');
Route::get('/available_jobs/{id}', [JobseekerController::class, 'available_jobs_details'])->name('available_jobs.details');
Route::post('/job/apply', [JobseekerController::class, 'apply'])->name('job.apply');
Route::post('/feedback/store', [JobseekerController::class, 'feedback_store'])->name('feedback.store')->middleware('auth');
Route::get('/get_country',[JobseekerController::class,'get_country'])->name('get_country');
//for fetching state
Route::get('/get_state/{country_id}',[JobseekerController::class,'get_state'])->name('get_state');
//for fetching city
Route::get('/get_city/{state_id}',[JobseekerController::class,'get_city'])->name('get_city');
Route::get('/userProfile', [JobseekerController::class, 'userProfile'])->name('userProfile');
Route::post('/UpdateProfile',[JobseekerController::class,'UpdateProfile'])->middleware(['auth', 'verified'])->name('UpdateProfile');


//-------Company's URL's--------//
Route::get('/dashboard', [CompanyController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/manageJobs', [CompanyController::class, 'manage_jobs'])->name('manageJobs');
Route::get('/manageApplications', [CompanyController::class, 'manage_applications'])->name('manageApplications');
Route::get('/manageInterviews', [CompanyController::class, 'manage_interviews'])->name('manageInterviews');
Route::get('/CompanyFeedback', [CompanyController::class, 'CompanyFeedback'])->name('CompanyFeedback');
Route::post('/CompanyFeedback/store', [CompanyController::class, 'CompanyFeedback_store'])->name('CompanyFeedback.store')->middleware('auth');
Route::post('/deleteJob/{job_id}', [CompanyController::class, 'deleteJob'])->name('deleteJob');
Route::post('/jobs/store', [CompanyController::class, 'addJob'])->name('jobs.store');
Route::post('/jobs/edit', [CompanyController::class, 'editJob'])->name('jobs.edit');
Route::post('/jobApplication/edit', [CompanyController::class, 'editApplication'])->name('jobApplication.edit');
Route::get('/viewApplication/{id}', [CompanyController::class, 'viewApplication'])->name('viewApplication');
Route::get('/DownloadResume', [CompanyController::class, 'DownloadResume'])->name('DownloadResume');
Route::post('/schedule/interview', [InterviewController::class, 'scheduleInterview'])->name('schedule.interview');
//Route::post('/zoom/create-meeting', [ZoomMeetingController::class, 'createMeeting'])->middleware(['auth', 'verified'])->name('CreateMeeting');

//-------Admin's URL's--------//
Route::get('/adminDashboard',[AdminController::class, 'dashboard'])->middleware(['auth','verified'])->name('adminDashboard');

                
require __DIR__.'/auth.php';