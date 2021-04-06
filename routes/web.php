<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MainUserController;
use App\Http\Controllers\MainAdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\NewsletterController;
use App\Http\Controllers\Admin\BrandController;
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
    return view('pages.index');
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

    //Categorys
    Route::get('/admin/category', [CategoryController::class, 'index'])->name('category.index');
    Route::post('/admin/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/admin/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/admin/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/admin/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');


    //Brands
    // Brand Controller
    Route::get('/admin/brand', [BrandController::class, 'index'])->name('brand.index');
    Route::post('/admin/brand/add', [BrandController::class, 'store'])->name('brand.store');
    Route::get('/admin/brand/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
    Route::post('/admin/brand/update/{id}', [BrandController::class, 'update'])->name('brand.update');
    Route::get('/admin/brand/delete/{id}', [BrandController::class, 'destroy'])->name('brand.delete');

    //Sub Categorys
    Route::get('/admin/subcategory', [SubcategoryController::class, 'index'])->name('subcategory.index');
    Route::post('/admin/subcategory/store', [SubcategoryController::class, 'store'])->name('subcategory.store');
    Route::get('/admin/subcategory/edit/{id}', [SubcategoryController::class, 'edit'])->name('subcategory.edit');
    Route::post('/admin/subcategory/update/{id}', [SubcategoryController::class, 'update'])->name('subcategory.update');
    Route::get('/admin/subcategory/delete/{id}', [SubcategoryController::class, 'destroy'])->name('subcategory.delete');

    //Coupons
    Route::get('/admin/coupon', [CouponController::class, 'index'])->name('coupon.index');
    Route::post('/admin/coupon/store', [CouponController::class, 'store'])->name('coupon.store');
    Route::get('/admin/coupon/edit/{id}', [CouponController::class, 'edit'])->name('coupon.edit');
    Route::post('/admin/coupon/update/{id}', [CouponController::class, 'update'])->name('coupon.update');
    Route::get('/admin/coupon/delete/{id}', [CouponController::class, 'destroy'])->name('coupon.delete');

    //Newsletter
    Route::get('/admin/newsletter', [NewsletterController::class, 'index'])->name('newsletter.index');
    Route::post('/admin/newsletter/store', [NewsletterController::class, 'store'])->name('newsletter.store');
    Route::get('/admin/newsletter/edit/{id}', [NewsletterController::class, 'edit'])->name('newsletter.edit');
    Route::post('/admin/newsletter/update/{id}', [NewsletterController::class, 'update'])->name('newsletter.update');
    Route::get('/admin/newsletter/delete/{id}', [NewsletterController::class, 'destroy'])->name('newsletter.delete');

});

// Front end Routes
Route::post('/admin/newsletter/store', [NewsletterController::class, 'store'])->name('newsletter.store');
Route::post('/admin/newsletter/unsub', [NewsletterController::class, 'unsubscribe'])->name('newsletter.unsubscribe');
require __DIR__ . '/auth.php';
