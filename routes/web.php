<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Vendor\VendorController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// SHOP INDEX/HOME ROOT PAGE  //
Route::get('/', function () {
    return view('shop.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// SHOP FRONTEND  //


// ADMIN DASHBOARD //

Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->
    name('admin.dashboard');

    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->
    name('admin.profile');

    Route::post('/admin/profile', [AdminController::class, 'AdminProfileSave'])->
    name('admin.profile.save');

    Route::get('/admin/profile/password', [AdminController::class, 'AdminProfilePassword'])->
    name('admin.profile.password');

    Route::post('/admin/profile/password', [AdminController::class, 'AdminProfilePasswordUpdate'])->
    name('admin.profile.password.update');

    Route::get('/admin/logout', [AdminController::class, 'AdminDestroy'])->
    name('admin.logout');
});



// VENDOR DASHBOARD //

Route::middleware(['auth','role:vendor'])->group(function(){
    Route::get('/vendor/dashboard', [VendorController::class, 'VendorDashboard'])->
    name('vendor.dashboard');
});


Route::get('/admin/login', [AdminController::class, 'AdminLogin']);



// CLIENT DASHBOARD //

