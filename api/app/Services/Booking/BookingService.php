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
        return $this->postBookingAction->execute($request);
    }

    public function retrieveBookings()
    {
        return $this->getBookingsAction->execute();
    }

    public function searchBookings($paxName)
    {
        return $this->findBookingAction->execute($paxName);
    }

    public function retrieveBooking($bookingID)
    {
        return $this->getBookingAction->execute($bookingID);
    }

    public function paginateBooking($request)
    {
        return $this->getBookingPaginationAction->execute($request);
    }

    public function updateBooking($request, $bookingID)
    {
        return $this->putBookingAction->execute($request, $bookingID);
    }

    public function removeBooking($bookingID)
    {
        return $this->deleteBookingAction->execute($bookingID);
    }
}
