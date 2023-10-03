<?php

use App\Http\Controllers\Admin\DomainController;
use App\Http\Controllers\SubdomainController;
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
Route::get('/s', function () {
    return view('welcome');
});

// sub domain route

Route::domain('{domain}.example.com')->group(function () {
    // Admin routes go here
    Route::get('/',[SubdomainController::class,'index']);

});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// admin routes
Route::prefix('dashboard-admin')->middleware(['checkrole:2'])->group(function () {
    Route::get('/', function () {
        return view('super_admin.welcome');
    });

    Route::get('/domain',[DomainController::class,'index'])->name('index.domain.admin');
    // Route::domain('/{domain}.example.com',[DomainController::class,'domainName'])->name('name.domain.admin');
});
// super admins routes
Route::prefix('dashboard')->middleware(['checkrole:1'])->group(function () {
    Route::get('/', function () {
        return view('super_admin.welcome');
    })->name('dashboard.superadmin');

    // admin routes
    Route::get('/admin',[\App\Http\Controllers\Superadmin\AdminController::class,'index'])->name('index.admin.superadmin');
    Route::get('/admin/create',[\App\Http\Controllers\Superadmin\AdminController::class,'create'])->name('create.admin.superadmin');
    Route::post('/admin/store',[\App\Http\Controllers\Superadmin\AdminController::class,'store'])->name('store.admin.superadmin');
    Route::get('/admin/edit/{id}',[\App\Http\Controllers\Superadmin\AdminController::class,'edit'])->name('edit.admin.superadmin');
    Route::put('/admin/update/{id}',[\App\Http\Controllers\Superadmin\AdminController::class,'update'])->name('update.admin.superadmin');
    Route::get('/admin/delete/{id}',[\App\Http\Controllers\Superadmin\AdminController::class,'delete'])->name('delete.admin.superadmin');

    // domain routes
    Route::get('/domain',[\App\Http\Controllers\Superadmin\DomainController::class,'index'])->name('index.domain.superadmin');
    Route::get('/domain/create',[\App\Http\Controllers\Superadmin\DomainController::class,'create'])->name('create.domain.superadmin');
    Route::post('/domain/store',[\App\Http\Controllers\Superadmin\DomainController::class,'store'])->name('store.domain.superadmin');
    Route::get('/domain/edit/{id}',[\App\Http\Controllers\Superadmin\DomainController::class,'edit'])->name('edit.domain.superadmin');
    Route::put('/domain/update/{id}',[\App\Http\Controllers\Superadmin\DomainController::class,'update'])->name('update.domain.superadmin');
    Route::get('/domain/delete/{id}',[\App\Http\Controllers\Superadmin\DomainController::class,'delete'])->name('delete.domain.superadmin');


});
