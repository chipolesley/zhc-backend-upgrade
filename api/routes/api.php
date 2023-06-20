<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\NationalityController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ConsultantController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(AgentController::class)->group(function () {
    Route::get('/agents', 'getAgents');
    Route::get('/agent/{agentID}', 'getAgent');
    Route::post('/agent', 'createAgent');
    Route::post('/agent/paginate', 'paginateAgent');
    Route::put('/agents/{agentID}', 'updateAgent');
    Route::delete('/agents/{agentID}', 'deleteAgents');
});

Route::controller(BookingController::class)->group(function () {
    Route::get('/bookings', 'getBookings');
    Route::get('/booking/{bookingID}', 'getBooking');
    Route::get('/booking/search/{paxName}', 'searchBookings');
    Route::post('/booking', 'createBooking');
    Route::post('/booking/paginate', 'paginateBooking');
    Route::put('/bookings/{bookingID}', 'updateBooking');
    Route::delete('/bookings/{bookingID}', 'deleteBookings');
});

Route::controller(ProductDetailController::class)->group(function () {
    Route::get('/bookingdetails', 'getProductDetails');
    Route::get('/bookingdetail/{productDetailID}', 'getProductDetail');
    Route::post('/bookingdetail', 'createProductDetail');
    Route::post('/bookingdetails', 'getProductDetails');
    Route::post('/bookingdetail/paginate', 'paginateProductDetail');
    Route::put('/bookingdetails/{productDetailID}', 'updateProductDetail');
    Route::delete('/bookingdetails/{productDetailID}', 'deleteProductDetails');
});

Route::controller(NationalityController::class)->group(function () {
    Route::get('/nationalities', 'getNationalities');
    Route::get('/nationality/{nationalityID}', 'getNationality');
    Route::post('/nationality', 'createNationality');
    Route::post('/nationality/paginate', 'paginateNationality');
    Route::put('/nationalities/{nationalityID}', 'updateNationality');
    Route::delete('/nationalities/{nationalityID}', 'deleteNationality');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/products', 'getProducts');
    Route::get('/product/{productID}', 'getProduct');
    Route::post('/product', 'createProduct');
    Route::post('/product/paginate', 'paginateProduct');
    Route::put('/products/{productID}', 'updateProduct');
    Route::delete('/products/{productID}', 'deleteProduct');
});

Route::controller(ConsultantController::class)->group(function () {
    Route::get('/consultants', 'getConsultants');
    Route::get('/consultant/{consultantID}', 'getConsultant');
    Route::post('/consultant', 'createConsultant');
    Route::post('/consultant/paginate', 'paginateConsultant');
    Route::put('/consultant/{consultantID}', 'updateConsultant');
    Route::delete('/consultants/{consultantID}', 'deleteConsultant');
});

