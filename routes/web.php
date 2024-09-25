<?php

use App\Http\Controllers\PaypalController;
use App\Http\Controllers\RazorpayController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/razorpay', function () {
    return view('razorpay');
});
Route::post('paypal',[PaypalController::class,'paypal'])->name('paypal');
Route::get('success',[PaypalController::class,'success'])->name('success');
Route::get('cancel',[PaypalController::class,'cancel'])->name('cancel');

Route::get('razorpaySuccess',[RazorpayController::class,'razorpaySuccess'])->name('razorpaySuccess');
Route::get('razorpayCancel',[RazorpayController::class,'razorpayCancel'])->name('razorpayCancel');
Route::post('razorpay',[RazorpayController::class,'razorpay'])->name('razorpay');