<?php
namespace App\Services\Booking;

interface BookingServiceInterface
{
    public function createBooking($request);
    public function retrieveBookings();
    public function retrieveBooking($bookingID);
    public function searchBookings($paxName);
    public function paginateBooking($request);
    public function updateBooking($request, $bookingID);
    public function removeBooking($bookingID);
}
