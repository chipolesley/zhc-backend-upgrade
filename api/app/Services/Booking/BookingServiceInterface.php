<?php
namespace App\Services\Booking;

interface BookingServiceInterface
{
    public function createBooking($request);
    public function getBookings();
    public function getBooking($bookingID);
    public function searchBookings($paxName);
    public function paginateBooking($request);
    public function updateBooking($request, $bookingID);
    public function deleteBooking($bookingID);
}
