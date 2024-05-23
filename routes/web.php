<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});


Route::get('/', function () {
    return view('layout');
});

Route::get('/about', function () {
    return view('qr-scanner');
});

Route::get('/import', function () {
    return view('import');
});

Route::get('/products', [ProductController::class, 'index']);
Route::get('/qr-scanner', [ProductController::class, 'showQRScanner'])->name('qr-scanner');

Route::get('/products/create', [ProductController::class, 'create']);
Route::put('/products/{product}', [ProductController::class, 'update']);
Route::get('/products/pdf', [ProductController::class, 'export'])->name('products.pdf');

Route::get('/generate-csv', [ProductController::class, 'generateCSV']);
Route::get('/download-csv', [ProductController::class, 'downloadCSV'])->name('products.csv');
Route::post('/import-csv', [ProductController::class, 'importCSV'])->name('import.csv');




