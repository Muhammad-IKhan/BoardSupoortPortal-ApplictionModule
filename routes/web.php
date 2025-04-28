<?php

use Illuminate\Support\Facades\Route;
use App\Models\{Year, Head};
use App\Http\Controllers\indexPageInputController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\PrintController;

// Home Route
Route::get('/', function () {
    return view('index');
})->name('home');

// First Form View
Route::get('/firstFormView/{profile?}', function () {
    $years = Year::all();
    $applicationTypes = Head::all();
    return view('firstFormView', compact('years', 'applicationTypes'));
})->name('firstFormView');

/*==================================
            indexPageInput 
==================================*/     
// Resource Route
Route::resource('index-page-inputs/store', indexPageInputController::class);
// Custom Routes
Route::post('/students/dashboard/', [indexPageInputController::class, 'store'])->name('index-page-inputs.store');

/*==================================
              Student 
==================================*/     
// Resource Route
Route::resource('students', StudentController::class)->only(['create', 'store']);

/*==================================
            Application 
==================================*/     
// Resource Route
Route::resource('applications', ApplicationController::class)->only(['create', 'store']);
// Custom Routes
Route::group(['prefix' => 'applications'], function () {
    Route::get('/create/{student_id}/{breakdown_id}', [indexPageInputController::class, 'store'])->name('applicationss.create');
    Route::post('{application_id?}', [indexPageInputController::class, 'store'])->name('applications.store');
});
Route::get('/application/filling/{student?}/{breakdown?}/{receipt?}/{head?}', [ApplicationController::class, 'renderApplicationFilling'])
    ->name('applicationFilling.render')
    ->where([
        'student' => '[0-9]+',
        'breakdown' => '[0-9]+',
        'receipt' => '[0-9]+',
        'head' => '[0-9]+'
    ]);

/*==================================
       Dashboard Panel Controller 
==================================*/     
// Dashboard route (no auth anymore)
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Profile
Route::view('/profile', 'profile.show')->name('profile');

// Settings
Route::view('/settings', 'settings.show')->name('settings');

/*==================================
        Receipt and Other Modules 
==================================*/     

/*==================================
          Print Modules 
==================================*/     
// Resource Route
Route::resource('prints', PrintController::class)->only(['create', 'store']);
// Custom Routes
Route::post('/StudentDashboard/application/printing/', [PrintController::class, 'create'])->name('prints.create');
Route::post('/prints/dashboard2/', [PrintController::class, 'store'])->name('prints.render');
