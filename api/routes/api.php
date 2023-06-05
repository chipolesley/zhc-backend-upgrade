<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AgentController;
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
    Route::get('/agent/{AgentID}', 'getAgent');
    Route::post('/agent', 'postAgents');
    Route::post('/agent/paginate', 'paginateAgent');
    Route::put('/agents/{AgentID}', 'putAgents');
    Route::delete('/agents/{AgentID}', 'deleteAgents');
});

Route::controller(BookingController::class)->group(function () {
    Route::get('/bookings', 'getBookings');
    Route::get('/booking/{BookingID}', 'getBooking');
    Route::get('/booking/search/{PaxName}', 'searchBookings');
    Route::post('/booking', 'postBookings');
    Route::post('/booking/paginate', 'paginateBooking');
    Route::put('/bookings/{BookingID}', 'putBookings');
    Route::delete('/bookings/{BookingID}', 'deleteBookings');
});