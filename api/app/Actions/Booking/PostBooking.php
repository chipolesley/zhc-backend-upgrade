<?php

namespace App\Actions\Booking;

use App\Models\Booking;

class PostBooking
{
    public function execute($request)
    {
        $booking = [];
        $message = '';
        try
        {
            //create a new booking
            $booking = new Booking();
            $booking->content = $request->input('content');
            $booking->save();

            $message = 'Booking was successfully created';
        }
        catch (\Throwable $th) {
            $message = $th;
            throw $th;
        }

        return [
            'booking' => $booking,
            'message' => $message
        ];
    }
}