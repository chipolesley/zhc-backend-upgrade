<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Services\BookingService;


class BookingController extends Controller
{
    public function __construct(
        protected BookingService $bookingService
    ){}

    public function getBookings()
    {
        $response = $this->bookingService->getBookings();
        return response()->json($response, 200);
    }

    public function getBooking($BookingID)
    {
        $booking = $this->bookingService->getBooking($BookingID);
        return response()->json($response, 200);
    }

    public function searchBookings($PaxName)
    {
        $bookings = $this->bookingService->searchBookings($PaxName);
        return response()->json($response, 200);
    }

    public function paginateBooking(Request $request)
    {
        $booking = $this->bookingService->paginateBooking($request);
        return response()->json( $booking, 200);
    }

    public function postBooking(Request $request)
    {
        
        $booking = $this->bookingService->createBooking($request);
        return $booking;
    }

    public function putBooking(Request $request, $BookingID)
    {
        $booking = $this->bookingService->putBooking($request, $BookingID);
        return response()->json($booking, 200);
    }

    public function deleteBooking($BookingID)
    {
        $booking = $this->bookingService->deleteBooking($BookingID);
        return response()->json($booking, 200);
    }
}