<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\StockController;






Auth::routes();
Route::get('/', [HomeController::class, 'index']);

Route::get('/add-supplier', [SupplierController::class, 'index']);
Route::post('/save-supplier', [SupplierController::class, 'store']);
Route::get('/manage-supplier', [SupplierController::class, 'show']);
Route::post('/edit-supplier', [SupplierController::class, 'edit']);
Route::post('/update-supplier/{supplier_id}', [SupplierController::class, 'update']);
Route::post('/delete-supplier', [SupplierController::class, 'destroy']);



Route::get('/add-product', [ProductController::class, 'index']);
Route::post('/save-product', [ProductController::class, 'store']);
Route::get('/manage-product', [ProductController::class, 'show']);
Route::post('/edit-product', [ProductController::class, 'edit']);
Route::post('/update-product/{product_id}', [ProductController::class, 'update']);
Route::post('/delete-product', [ProductController::class, 'destroy']);

Route::get('/purchase', [PurchaseController::class, 'index']);
Route::post('/save-purchase', [PurchaseController::class, 'store']);
Route::get('/stoke', [PurchaseController::class, 'show']);


Route::get('/sale', [SaleController::class, 'index']);
Route::post('/sale-add', [SaleController::class, 'add']);
Route::get('/sale-view', [SaleController::class, 'order_show']);
Route::get('/confirm-page', [SaleController::class, 'confirm_page']);
Route::post('/delete-order', [SaleController::class, 'delete']);
Route::post('/confirm-order', [SaleController::class, 'confirm_order']);

Route::get('/report', [SaleController::class, 'report']);
Route::post('/view-iteams', [SaleController::class, 'view_iteams']);