<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'loginPage'])->name('login.page')->middleware('guest');
Route::post('/login-request', [AuthController::class, 'login'])->name('login.request')->middleware('guest');
Route::get('/register', [AuthController::class, 'registerPage'])->name('register.page')->middleware('guest');
Route::post('/register-request', [AuthController::class, 'register'])->name('register.request')->middleware('guest');

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    // income routes
    Route::get('/admin/income', [IncomeController::class, 'index'])->name('admin.income');
    Route::post('/admin/income/store', [IncomeController::class, 'store'])->name('admin.income.store');
    Route::get('/admin/income/edit/{income}', [IncomeController::class, 'edit'])->name('admin.income.edit');
    Route::put('/admin/income/update/{income}', [IncomeController::class, 'update'])->name('admin.income.update');
    Route::delete('/admin/income/destroy/{income}', [IncomeController::class, 'destroy'])->name('admin.income.destroy');
    // expense routes
    Route::get('/admin/expense', [ExpenseController::class, 'index'])->name('admin.expense');
    Route::post('/admin/expense/store', [ExpenseController::class, 'store'])->name('admin.expense.store');
    Route::get('/admin/expense/edit/{expense}', [ExpenseController::class, 'edit'])->name('admin.expense.edit');
    Route::put('/admin/expense/update/{expense}', [ExpenseController::class, 'update'])->name('admin.expense.update');
    Route::delete('/admin/expense/destroy/{expense}', [ExpenseController::class, 'destroy'])->name('admin.expense.destroy');
    // logout
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
