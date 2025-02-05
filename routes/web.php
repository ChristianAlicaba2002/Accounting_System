<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Product\ExportProductExcel;

Route::get('/', function () {
    return view('components.auth.Login');
})->name('Auth.Login');
Route::get('/register', function () {
    return view('components.auth.Register');
})->name('Auth.Register');

Route::get('/ledger', function () {
    return view('layouts.navigationButton.Ledger');
})->name('LedgerPage');

Route::get('/invoices', function () {
    return view('layouts.navigationButton.Invoces');
})->name('InvoicesPage');

Route::get('/reports', function () {
    return view('layouts.navigationButton.Reports');
})->name('ReportsPage');

Route::get('/vendors', function () {
    $products = DB::table('products')->where('adminId', Auth::user()->adminId)->get();
    return view('layouts.Vendor', compact('products'));
})->name('vendors');

Route::get('/settings', function () {
    return view('layouts.Setting');
})->name('SettingsPage');

Route::post('/register/admin', [AdminController::class, 'CreateAdmin'])->name('admin.register');
Route::post('/login/admin', [AdminController::class, 'LoginAdmin'])->name('admin.login');
Route::post('/logout/admin', [AdminController::class, 'logoutAdmin'])->name('admin.logout');


Route::post('/create/product', [ProductController::class, 'CreateProduct'])->name('product.create');
Route::delete('/delete/product/{productId}', [ProductController::class, 'DeleteProduct'])->name('product.delete');
Route::get('/edit/product/{productId}', [ProductController::class, 'EditProduct'])->name('product.edit');


Route::get('/export-users-excel', [ExportProductExcel::class, 'UserexportToExcel'])->name('export.users.excel');
