<?php

use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\AuthController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\admin\AdminItemsController;
use App\Http\Controllers\superadmin\ItemsController;
use App\Http\Controllers\superadmin\PlansController;
use App\Http\Controllers\admin\AdminProfileController;
use App\Http\Controllers\superadmin\ProfileController;
use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\superadmin\AdminListController;
use App\Http\Controllers\superadmin\DashboardController;
use App\Http\Controllers\admin\AdminInstallmentController;
use App\Http\Controllers\superadmin\InstallmentController;
use App\Http\Controllers\admin\AdminCustomerListController;
use App\Http\Controllers\customer\CustomerController;
use App\Http\Controllers\superadmin\CustomersListController;
use App\Http\Controllers\superadmin\CustomerRequestController;
use App\Http\Middleware\AdminAuthentication;
use App\Http\Middleware\SuperAdminAuthentication;

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

// Auth Section
Route::controller(AuthController::class)->group(function () {
    Route::middleware(RedirectIfAuthenticated::class)->group(function () {
        Route::get('/', 'login_view')->name('login');
        Route::post('/', 'login');
        // Route::get('register', 'register_view')->name('register');
        // Route::post('register', 'register');
    });
    Route::get('logout', 'logout')->name('logout');
});


// Admins Section
Route::middleware(Authenticate::class)->group(function () {
    // Super Admin Section
    Route::middleware(SuperAdminAuthentication::class)->prefix('superadmin')->group(function () {
        Route::controller(DashboardController::class)->group(function () {
            Route::get('dashboard', 'index')->name('superadmin.dashboard');
        });

        Route::controller(ProfileController::class)->group(function () {
            Route::get('profile/edit', 'edit')->name('profile');
            Route::post('details/edit', 'update_details')->name('profile.details');
            Route::post('picture/edit', 'update_picture')->name('profile.picture');
            Route::post('password/edit', 'update_password')->name('profile.password');
        });

        Route::controller(AdminListController::class)->group(function () {
            Route::get('adminlist/show', 'index')->name('admin.show');
            Route::get('adminlist/create', 'create')->name('admin.create');
            Route::post('adminlist/create', 'store');
            Route::get('adminlist/{user}/edit', 'edit')->name('admin.edit');
            Route::post('adminlist/{user}/edit', 'update');
            Route::get('adminlist/{user}/destroy', 'destroy')->name('admin.destroy');
        });

        Route::controller(CustomersListController::class)->group(function () {
            Route::get('customerlist/index', 'index')->name('customerlist');
            Route::get('customerlist/create', 'create')->name('customer.create');
            Route::post('customerlist/create', 'store');
            Route::get('customerlist/{customer}/details', 'details')->name('customer.details');
            Route::get('customerlist/{customer}/edit', 'edit')->name('customer.edit');
            Route::post('customerlist/{customer}/edit', 'update');
            Route::get('customerlist/{customer}/destroy', 'destroy')->name('customer.destroy');
        });

        Route::controller(PlansController::class)->group(function () {
            Route::get('plans/index', 'index')->name('plans.show');
            Route::get('plans/create', 'create')->name('plans.create');
            Route::post('plans/create', 'store');
            Route::get('plans/{plan}/edit', 'edit')->name('plans.edit');
            Route::post('plans/{plan}/edit', 'update');
            Route::get('plans/{plan}/destroy', 'destroy')->name('plan.destroy');
        });

        Route::controller(ItemsController::class)->group(function () {
            Route::get('item/show', 'index')->name('items.show');
            Route::get('item/{customer}/create', 'create')->name('item.create');
            Route::get('item/{item}/edit', 'edit')->name('item.edit');
            Route::post('item/{item}/edit', 'update');
            Route::post('item/{customer}/create', 'store');
            Route::get('item/{item}/destroy', 'destroy')->name('item.destroy');
        });

        Route::controller(CustomerRequestController::class)->group(function () {
            Route::get('customerrequest/index', 'index')->name('request.show');
        });

        Route::controller(InstallmentController::class)->group(function () {
            Route::post('installment/{item}/create', 'store')->name('installment.create');
            Route::get('installment/{installment}/destroy', 'destroy')->name('installment.destroy');
        });
    });

    // Admin Section
    Route::middleware(AdminAuthentication::class)->prefix('admin/')->group(function () {
        Route::controller(AdminDashboardController::class)->group(function () {
            Route::get('dashboard', 'index')->name('admin.dashboard');
        });

        Route::controller(AdminProfileController::class)->group(function () {
            Route::get('profile/edit', 'edit')->name('admin.profile');
            Route::post('picture/edit', 'update_picture')->name('admin.profile.picture');
        });

        Route::controller(AdminCustomerListController::class)->group(function () {
            Route::get('customerlist/index', 'index')->name('admin.customerlist');
            Route::get('customerlist/create', 'create')->name('admin.customer.create');
            Route::post('customerlist/create', 'store');
            Route::get('customerlist/{customer}/details', 'details')->name('admin.customer.details');
        });

        Route::controller(AdminItemsController::class)->group(function () {
            Route::get('item/{customer}/create', 'create')->name('admin.item.create');
            Route::post('item/{customer}/create', 'store');
        });

        Route::controller(AdminInstallmentController::class)->group(function () {
            Route::post('installment/{item}/create', 'store')->name('admin.installment.create');
        });
    });
});

Route::controller(CustomerController::class)->prefix('customer/')->group(function () {
    Route::post('/', 'customer_login')->name('customer.login');
    Route::get('show', 'show')->name('customer.show');
    Route::get('logout', 'logout')->name('customer.logout');
});
