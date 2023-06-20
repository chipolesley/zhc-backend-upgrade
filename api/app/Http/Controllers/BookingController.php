<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Services\Booking\BookingServiceInterface as iBookingService;


class BookingController extends Controller
{
    public function __construct(
        protected iBookingService $iBookingService
    ){}

    public function getBookings()
    {
        $bookings = $this->iBookingService->retrieveBookings();
        return response()->json($bookings, 200);
    }

    public function getBooking($bookingID)
    {
        $booking = $this->iBookingService->retrieveBooking($bookingID);
        return response()->json($booking, 200);
    }

    public function searchBookings($paxName)
    {
        $bookings = $this->iBookingService->searchBookings($paxName);
        return response()->json($bookings, 200);
    }

    public function paginateBooking(Request $request)
    {
        $booking = $this->iBookingService->paginateBooking($request);
        return response()->json($booking, 200);
    }

    public function createBooking(Request $request)
    {
        $booking = $this->iBookingService->createBooking($request);
        return response()->json($booking, 200);
    }

    public function updateBooking(Request $request, $bookingID)
    {
        $booking = $this->iBookingService->updateBooking($request, $bookingID);
        return response()->json($booking, 200);
    }

    public function deleteBooking($bookingID)
    {
        $booking = $this->iBookingService->removeBooking($bookingID);
        return response()->json($booking, 200);
    }
}
