<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Hr;
use App\Http\Controllers\Employee;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public / Frontend Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('frontend.home');
})->name('home');

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);

    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'role:admin'])
    ->group(function () {

        Route::get('/dashboard', [Admin\DashboardController::class, 'index'])->name('dashboard');

        Route::resource('departments', Admin\DepartmentController::class);

        Route::resource('employees', Admin\EmployeeController::class);

        Route::get('/attendances', [Admin\AttendanceController::class, 'index'])->name('attendances.index');
        Route::get('/attendances/create', [Admin\AttendanceController::class, 'create'])->name('attendances.create');
        Route::post('/attendances', [Admin\AttendanceController::class, 'store'])->name('attendances.store');
        Route::get('/attendances/{attendance}/edit', [Admin\AttendanceController::class, 'edit'])->name('attendances.edit');
        Route::put('/attendances/{attendance}', [Admin\AttendanceController::class, 'update'])->name('attendances.update');
        Route::delete('/attendances/{attendance}', [Admin\AttendanceController::class, 'destroy'])->name('attendances.destroy');

        Route::get('/leaves', [Admin\LeaveController::class, 'index'])->name('leaves.index');
        Route::get('/leaves/{leave}', [Admin\LeaveController::class, 'show'])->name('leaves.show');
        Route::post('/leaves/{leave}/approve', [Admin\LeaveController::class, 'approve'])->name('leaves.approve');
        Route::post('/leaves/{leave}/reject', [Admin\LeaveController::class, 'reject'])->name('leaves.reject');

        Route::resource('appointments', Admin\AppointmentController::class);

        Route::get('/payrolls', [Admin\PayrollController::class, 'index'])->name('payrolls.index');
        Route::get('/payrolls/create', [Admin\PayrollController::class, 'create'])->name('payrolls.create');
        Route::post('/payrolls', [Admin\PayrollController::class, 'store'])->name('payrolls.store');
        Route::get('/payrolls/{payroll}', [Admin\PayrollController::class, 'show'])->name('payrolls.show');
        Route::post('/payrolls/{payroll}/mark-paid', [Admin\PayrollController::class, 'markAsPaid'])->name('payrolls.markAsPaid');
        Route::delete('/payrolls/{payroll}', [Admin\PayrollController::class, 'destroy'])->name('payrolls.destroy');
    });

/*
|--------------------------------------------------------------------------
| HR Routes
|--------------------------------------------------------------------------
*/

Route::prefix('hr')
    ->name('hr.')
    ->middleware(['auth', 'role:hr,admin'])
    ->group(function () {

        Route::get('/dashboard', [Hr\DashboardController::class, 'index'])->name('dashboard');

        Route::get('/leaves', [Hr\LeaveController::class, 'index'])->name('leaves.index');
        Route::get('/leaves/{leave}', [Hr\LeaveController::class, 'show'])->name('leaves.show');
        Route::post('/leaves/{leave}/approve', [Hr\LeaveController::class, 'approve'])->name('leaves.approve');
        Route::post('/leaves/{leave}/reject', [Hr\LeaveController::class, 'reject'])->name('leaves.reject');
    });

/*
|--------------------------------------------------------------------------
| Employee Routes
|--------------------------------------------------------------------------
*/

Route::prefix('employee')
    ->name('employee.')
    ->middleware(['auth', 'role:employee,hr,admin'])
    ->group(function () {

        Route::get('/dashboard', [Employee\DashboardController::class, 'index'])->name('dashboard');

        Route::get('/leaves', [Employee\LeaveController::class, 'index'])->name('leaves.index');
        Route::get('/leaves/create', [Employee\LeaveController::class, 'create'])->name('leaves.create');
        Route::post('/leaves', [Employee\LeaveController::class, 'store'])->name('leaves.store');
        Route::get('/leaves/{leave}', [Employee\LeaveController::class, 'show'])->name('leaves.show');
        Route::post('/leaves/{leave}/cancel', [Employee\LeaveController::class, 'cancel'])->name('leaves.cancel');

        Route::get('/attendances', [Employee\AttendanceController::class, 'index'])->name('attendances.index');

        Route::get('/payrolls', [Employee\PayrollController::class, 'index'])->name('payrolls.index');
        Route::get('/payrolls/{payroll}', [Employee\PayrollController::class, 'show'])->name('payrolls.show');
    });
