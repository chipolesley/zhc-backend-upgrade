<?php

namespace App\Actions\Booking;

use App\Models\Booking;

class DeleteBooking
{
    public function execute($bookingID)
    {
        $booking = Booking::where('BookingID','=',$bookingID)->get();
        if ($booking !== null)
        {
            $booking->delete();
            return [
                'isSuccess' => true,
                'data' => $bookingID,
                'message' => 'Booking was deleted',
                'statusCode' => 200
            ];
        }
        else
        {
            return [
                'isSuccess' => false,
                'data' => $bookingID,
                'message' => 'Booking was not found',
                'statusCode' => 404
            ];
        }
    }
}