<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController; 

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [InvoiceController::class,"index"]);

Route::get('/captcha', [InvoiceController::class,"captcha"]);

Route::get('/captcha_v3', [InvoiceController::class,"captcha_v3"]);

Route::post('/captcha-submit', [InvoiceController::class,"captcha_submit"]);

Route::post('/captcha-vThree-submit', [InvoiceController::class,"captcha_vThree_submit"]);

Route::post('/generate_Pdf',[InvoiceController::class,"generate_Pdf"]);

Route::post('/invoice_view',[InvoiceController::class,"invoice_view"]);

Route::post('/send_email',[InvoiceController::class,"send_email"]);

