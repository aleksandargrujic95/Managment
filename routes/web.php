<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SearchController;
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

Route::get('/', [DashboardController::class , 'index']);


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/customers/import', [CustomerController::class, 'importShow']);
Route::post('/customers/import', [CustomerController::class, 'import']);

Route::resource('products', ProductController::class);
Route::resource('categories', CategoryController::class);
Route::resource('customers', CustomerController::class);
Route::resource('reservations', ReservationController::class);



Route::get('/test', [SearchController::class, 'test']);
