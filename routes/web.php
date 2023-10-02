<?php

use Illuminate\Support\Facades\Auth;
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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// super admin routes
Route::prefix('dashboard')->middleware(['checkrole:2'])->group(function () {
    Route::get('/admin', function () {
        return view('super_admin.welcome');
    });
});

// admins routes
Route::prefix('dashboard')->middleware(['checkrole:1'])->group(function () {
    Route::get('/', function () {
        return view('super_admin.welcome');
    })->name('dashboard.superadmin');

    Route::get('/admin',[\App\Http\Controllers\Superadmin\AdminController::class,'index'])->name('index.admin.superadmin');
    Route::get('/admin/create',[\App\Http\Controllers\Superadmin\AdminController::class,'create'])->name('create.admin.superadmin');
    Route::post('/admin/store',[\App\Http\Controllers\Superadmin\AdminController::class,'store'])->name('store.admin.superadmin');
    Route::get('/admin/edit/{id}',[\App\Http\Controllers\Superadmin\AdminController::class,'edit'])->name('edit.admin.superadmin');
    Route::put('/admin/update/{id}',[\App\Http\Controllers\Superadmin\AdminController::class,'update'])->name('update.admin.superadmin');
    Route::get('/admin/delete/{id}',[\App\Http\Controllers\Superadmin\AdminController::class,'delete'])->name('delete.admin.superadmin');
});
