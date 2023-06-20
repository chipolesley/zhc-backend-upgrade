<?php

namespace App\Services\Booking;

/** Actions Import*/
use App\Actions\Booking\PutBooking;
use App\Actions\Booking\GetBooking;
use App\Actions\Booking\FindBooking;
use App\Actions\Booking\PostBooking;
use App\Actions\Booking\GetBookings;
use App\Actions\Booking\DeleteBooking;
use App\Actions\Booking\GetBookingPagination;

class BookingService implements BookingServiceInterface
{
    public function __construct(
        protected PutBooking $putBookingAction,
        protected FindBooking $findBookingAction,
        protected GetBooking $getBookingAction,
        protected GetBookings $getBookingsAction,
        protected PostBooking $postBookingAction,
        protected DeleteBooking $deleteBookingAction,
        protected GetBookingPagination $getBookingPaginationAction,
    ){}
    
    public function createBooking($request)
    {
       $booking = $this->postBookingAction->execute($request);
        return $booking;
    }

    public function retrieveBookings()
    {
        $bookings = $this->getBookingsAction->execute();
        return $bookings;
    }

    public function searchBookings($paxName)
    {
        $booking = $this->findBookingAction->execute($paxName);
        return $booking;
    }

    public function retrieveBooking($bookingID)
    {
        $booking = $this->getBookingAction->execute($bookingID);
        return $booking;
    }

    public function paginateBooking($request)
    {
        $bookings = $this->getBookingPaginationAction->execute($request);
        return $bookings;
    }

    public function updateBooking($request, $bookingID)
    {
        $booking = $this->putBookingAction->execute($request, $bookingID);
        return $booking;
    }

    public function removeBooking($bookingID)
    {
        $booking = $this->deleteBookingAction->execute($bookingID);
        return $booking;
    }
}
