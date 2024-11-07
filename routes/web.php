<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ContractorController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\AccountingController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/employee', [EmployeeController::class, 'index'])->name('employee');
    Route::get('/accounting', [AccountingController::class, 'index'])->name('accounting');
    Route::get('/settings', [SettingController::class, 'index'])->name('settings');
    Route::post('/logout', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])->name('logout');
    // Employee Routes
    Route::get('/employee/create', [EmployeeController::class, 'create'])->name('employee.create');
    Route::post('/employee', [EmployeeController::class, 'store'])->name('employee.store');
    Route::get('/employee/{id}', [EmployeeController::class, 'show'])->name('employee.show');
    Route::get('/employee/{id}/edit', [EmployeeController::class, 'edit'])->name('employee.edit');
    Route::delete('/employee/{id}', [EmployeeController::class, 'destroy'])->name('employee.destroy');
    Route::put('/employee/{id}', [EmployeeController::class, 'update'])->name('employee.update');
    Route::get('/employee/export/pdf', [EmployeeController::class, 'exportPdf'])->name('employee.export.pdf');
    Route::get('/employee/export/xls', [EmployeeController::class, 'exportXls'])->name('employee.export.xls');
    Route::post('/employee/import', [EmployeeController::class, 'import'])->name('employee.import');
    // Project Routes
    Route::resource('projects', ProjectController::class);
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('projects.show');
    Route::get('/projects/{id}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::delete('/projects/{id}', [ProjectController::class, 'destroy'])->name('projects.destroy');
    Route::put('/projects/{id}', [ProjectController::class, 'update'])->name('projects.update');
    Route::get('/projects/export/pdf', [ProjectController::class, 'exportPdf'])->name('projects.export.pdf');
    // Contractor Routes
    Route::resource('contractors', ContractorController::class);
    Route::post('/projects/{project}/documents', [DocumentController::class, 'store'])->name('documents.store');
    Route::get('/documents/{document}/download', [DocumentController::class, 'download'])->name('documents.download');
    Route::delete('/documents/{document}', [DocumentController::class, 'destroy'])->name('documents.destroy');
    // Accounting Routes
    Route::resource('accounting', AccountingController::class);
    Route::get('/accounting/create', [AccountingController::class, 'create'])->name('accounting.create');
    Route::post('/accounting', [AccountingController::class, 'store'])->name('accounting.store');
    Route::get('/accounting/{id}', [AccountingController::class, 'show'])->name('accounting.show');
    Route::get('/accounting/{id}/edit', [AccountingController::class, 'edit'])->name('accounting.edit');
    Route::put('/accounting/{id}', [AccountingController::class, 'update'])->name('accounting.update');
    Route::delete('/accounting/{id}', [AccountingController::class, 'destroy'])->name('accounting.destroy');
    // Transaction Routes
    Route::resource('transactions', TransactionController::class);
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::post('/notifications/{notification}/read', [NotificationController::class, 'markAsRead'])->name('notifications.read');
});

Route::middleware(['auth', 'can:manage-admins'])->group(function () {
    Route::resource('admin', AdminController::class);
    Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/admin', [AdminController::class, 'store'])->name('admin.store');
});

require __DIR__.'/auth.php';
