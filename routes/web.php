<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MainUserController;
use App\Http\Controllers\MainAdminController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function () {
    Route::get('/login', [AdminController::class, 'loginForm'])->name('admin.loginform');
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});

Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {

    return view('admin.index');
})->name('dashboard');

Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('user.index');
})->name('dashboard');


//User Dashboard
Route::get('/user/logout', [MainUserController::class, 'logout'])->name('user.logout');
Route::get('/user/profile', [MainUserController::class, 'show'])->name('user.profile');
Route::get('/user/profile/edit', [MainUserController::class, 'edit'])->name('profile.edit');
Route::post('/user/profile/update', [MainUserController::class, 'update'])->name('profile.update');
Route::post('/user/password/update', [MainUserController::class, 'passwordUpdate'])->name('password.update');
Route::get('/user/password/view', [MainUserController::class, 'passwordView'])->name('user.password.view');


Route::middleware(['auth:sanctum,admin', 'verified'])->group(function(){
    //Admin Dashboard
    Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
    Route::get('/admin/profile', [MainAdminController::class, 'show'])->name('admin.profile');
    Route::get('/admin/profile/edit', [MainAdminController::class, 'edit'])->name('admin.profile.edit');
    Route::post('/admin/profile/update', [MainAdminController::class, 'update'])->name('admin.profile.update');
    Route::post('/admin/password/update', [MainAdminController::class, 'passwordUpdate'])->name('admin.password.update');
    Route::get('/admin/password/view', [MainAdminController::class, 'passwordView'])->name('admin.password.view');
});


require __DIR__ . '/auth.php';
