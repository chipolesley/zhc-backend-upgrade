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
        $bookings = $this->bookingService->getBookings();
        return response()->json($bookings, 200);
    }

    public function getBooking($bookingID)
    {
        $booking = $this->bookingService->getBooking($bookingID);
        return response()->json($booking, 200);
    }

    public function searchBookings($paxName)
    {
        $bookings = $this->bookingService->searchBookings($paxName);
        return response()->json($bookings, 200);
    }

    public function paginateBooking(Request $request)
    {
        $booking = $this->bookingService->paginateBooking($request);
        return response()->json($booking, 200);
    }

    public function createBooking(Request $request)
    {
        $booking = $this->bookingService->createBooking($request);
        return response()->json($booking, 200);
    }

    public function updateBooking(Request $request, $bookingID)
    {
        $booking = $this->bookingService->updateBooking($request, $bookingID);
        return response()->json($booking, 200);
    }

    public function deleteBooking($bookingID)
    {
        $booking = $this->bookingService->deleteBooking($bookingID);
        return response()->json($booking, 200);
    }
}
