<?php

namespace App\Actions\Booking;

use App\Models\Booking;

class DeleteBooking
{
    public function execute($bookingID)
    {
        $booking = Booking::where('BookingID','=',$bookingID)->get();
        if ($booking)
        {
            $booking->delete();
            $response = [
                'booking' => $bookingID,
                'message' => 'Booking was deleted'
            ];
        }
        else
        {
            $response = [
                'booking' => $bookingID,
                'message' => 'Booking was not found'
            ];
        }
        return $response;
    }
}