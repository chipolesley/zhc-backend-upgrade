<?php

namespace App\Actions\Booking;

use App\Models\Booking;

class PostBooking
{
    public function execute($request)
    {
        try
        {
            //create a new booking
            $booking = new Booking();
            $booking->content = $request->input('content');
            $booking->save();

            return [
                'isSuccess' => true,
                'data' => $booking,
                'message' => 'Booking was successfully created',
                'statusCode' => 201
            ];
        }
        catch (\Throwable $th) {
            return [
                'isSuccess' => false,
                'data' => $booking,
                'message' => $th->getMessage(),
                'statusCode' => 500
            ];
        }

        
    }
}