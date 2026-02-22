<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// 1. Public Route
Route::get('/', function () {
    return view('welcome');
});

Route::view('/about', 'about');
Route::view('/contact', 'contact');

// 2. Logic to redirect after login (The Bridge)
Route::get('/dashboard', function () {
    $role = Auth::user()->role;

    if ($role === 'staff') {
        return redirect()->route('tickets.index');
    } elseif ($role === 'faculty') {
        return redirect()->route('faculty.dashboard');
    }
    return redirect()->route('student.dashboard');
})->middleware(['auth'])->name('dashboard');


// 3. Authenticated Routes
Route::middleware('auth')->group(function () {
    
    // Profile Management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // STUDENT ROUTES
    // Note: Agar aapne "role" middleware nahi banaya, toh hum temporary simple auth use kar rahe hain
    Route::get('/student/dashboard', [TicketController::class, 'studentDashboard'])->name('student.dashboard');
    Route::post('/report-issue', [TicketController::class, 'store'])->name('tickets.store');

    // NETWORK TEAM (STAFF) ROUTES
    Route::get('/admin/tickets', [TicketController::class, 'adminIndex'])->name('tickets.index');
    Route::patch('/admin/tickets/{ticket}', [TicketController::class, 'update'])->name('tickets.update');

    // FACULTY ROUTES
    Route::get('/faculty/monitoring', [TicketController::class, 'facultyDashboard'])->name('faculty.dashboard');
});

require __DIR__.'/auth.php';