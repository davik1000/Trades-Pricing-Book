<?php

use App\Http\Controllers\BusinessDetailController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyCostController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\EmployeeCostController;
use App\Http\Controllers\GrossMarginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\PriceListController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\QuoteTermController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
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

Route::get('/', [MainController::class, 'index'])->name('login');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::get('/customers', [CustomerController::class, 'index'])->name('customers')->middleware('auth');
Route::get('/customers', [CustomerController::class, 'edit'])->name('customers')->middleware('auth');
Route::resource('customers', CustomerController::class)->middleware('auth');

Route::get('/users', [UserController::class, 'index'])->name('users')->middleware('auth');
Route::resource('users', UserController::class)->middleware('auth');

Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers')->middleware('auth');
Route::get('/suppliers', [SupplierController::class, 'edit'])->name('suppliers')->middleware('auth');
Route::resource('suppliers', SupplierController::class)->middleware('auth');

Route::get('/materials', [MaterialController::class, 'index'])->name('materials')->middleware('auth');
Route::get('/materials', [MaterialController::class, 'edit'])->name('materials')->middleware('auth');
Route::resource('materials', MaterialController::class)->middleware('auth');

Route::get('/quoting', [QuoteController::class, 'index'])->name('quoting')->middleware('auth');
Route::get('/quoting', [QuoteController::class, 'edit'])->name('quoting')->middleware('auth');
Route::resource('quoting', QuoteController::class)->middleware('auth');

Route::get('/quoteterms', [QuoteTermController::class, 'index'])->name('quoteterms')->middleware('auth');
Route::get('/quoteterms', [QuoteTermController::class, 'edit'])->name('quoteterms')->middleware('auth');
Route::resource('quoteterms', QuoteTermController::class)->middleware('auth');

Route::get('/grossmargin', [GrossMarginController::class, 'index'])->name('grossmargin')->middleware('auth');
Route::get('/grossmargin', [GrossMarginController::class, 'edit'])->name('grossmargin')->middleware('auth');
Route::resource('grossmargin', GrossMarginController::class)->middleware('auth');

Route::get('/employeecosts', [EmployeeCostController::class, 'index'])->name('employeecosts')->middleware('auth');
Route::get('/employeecosts', [EmployeeCostController::class, 'edit'])->name('employeecosts')->middleware('auth');
Route::resource('employeecosts', EmployeeCostController::class)->middleware('auth');

Route::get('/discounts', [DiscountController::class, 'index'])->name('discounts')->middleware('auth');
Route::get('/discounts', [DiscountController::class, 'edit'])->name('discounts')->middleware('auth');
Route::resource('discounts', DiscountController::class)->middleware('auth');

Route::get('/totalcosts', [CompanyCostController::class, 'totalCosts'])->name('totalcosts')->middleware('auth');
Route::get('/companycosts', [CompanyCostController::class, 'index'])->name('companycosts')->middleware('auth');
Route::get('/companycosts', [CompanyCostController::class, 'edit'])->name('companycosts')->middleware('auth');
Route::resource('companycosts', CompanyCostController::class)->middleware('auth');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories')->middleware('auth');
Route::get('/categories', [CategoryController::class, 'edit'])->name('categories')->middleware('auth');
Route::resource('categories', CategoryController::class)->middleware('auth');

Route::get('/subcategories', [SubCategoryController::class, 'index'])->name('subcategories')->middleware('auth');
Route::get('/subcategories', [SubCategoryController::class, 'edit'])->name('subcategories')->middleware('auth');
Route::resource('subcategories', SubCategoryController::class)->middleware('auth');

Route::get('/pricelists', [PriceListController::class, 'index'])->name('pricelists')->middleware('auth');
Route::get('/pricelists/{page_id}/{id}/edit', [PriceListController::class, 'edit'])->middleware('auth');
Route::patch('/pricelists/{page_id}/{id}/update', [PriceListController::class, 'update'])->middleware('auth');
Route::resource('pricelists', PriceListController::class)->middleware('auth');

Route::get('/businessdetails', [BusinessDetailController::class, 'index'])->name('businessdetails')->middleware('auth');
Route::get('/businessdetails', [BusinessDetailController::class, 'edit'])->name('businessdetails')->middleware('auth');
Route::resource('businessdetails', BusinessDetailController::class)->middleware('auth');

Route::get('/login', [MainController::class, 'index'])->name('login');
Route::post('/main/checklogin', [MainController::class, 'checklogin']);
Route::get('/main/successlogin', [MainController::class, 'successlogin'])->middleware('auth');
Route::get('/main/logout', [MainController::class, 'logout']);
