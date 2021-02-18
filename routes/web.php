<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SmsController;
use App\Imports\CustomerImport;
use App\Models\Customer;
use App\Models\Reservation;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Middleware group for admin 

Route::middleware(['auth', 'admin'])->group(function () {

    // Dashboard Route
    Route::get('/', [DashboardController::class , 'index']);

    // Customers Routes
    Route::resource('customers', CustomerController::class);
    Route::get('/customer/import', [CustomerController::class, 'importShow']);
    Route::post('/customer/import', [CustomerController::class, 'import']);
    Route::get('customer/search', [CustomerController::class, 'search']);
    Route::get('customer/loyal', [CustomerController::class, 'loyal']);
    Route::get('customer/membership', [CustomerController::class, 'membership']);

    // Reservations Routes
    Route::resource('reservations', ReservationController::class);
    Route::get('/reservation/all', [ReservationController::class, 'indexAll']);

    // Products Routes
    Route::resource('products', ProductController::class);
    Route::get('product/inventory', [ProductController::class, 'inventory']);

    // Categories Routes
    Route::resource('categories', CategoryController::class);

    // Notifications Routes
    Route::resource('notifications', NotificationController::class);

    //Message Routes
    Route::get('send/message', [SmsController::class, 'sendMessage']);

});

// Middleware group for user
Route::middleware(['auth', 'user'])->group(function () {

    Route::get('/user/welcome', [RouteController::class, 'index']);

});

