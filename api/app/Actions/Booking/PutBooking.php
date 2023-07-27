<?php

namespace App\Actions\Booking;

use App\Models\Booking;

class PutBooking
{
    public function execute($request, $bookingID)
    {
        $booking = Booking::where('BookingID','=',$bookingID)->get();

        if ($booking !== null) {
            try
            {
                $booking->content = $request->input('content');
                $booking->save();
                
                return [
                    'isSuccess' => true,
                    'data' => $booking,
                    'message' => 'Booking was successfully updated',
                    'statusCode' => 200
                ];
            }
            catch (\Throwable $th)
            {
                return [
                    'isSuccess' => false,
                    'data' => $booking,
                    'message' => $th->getMessage(),
                    'statusCode' => 500
                ];
            }
        }
        else
        {
            return [
                'isSuccess' => false,
                'data' => [],
                'message' => 'BookingID'.$bookingID.' was not found',
                'statusCode' => 404
            ];
        }
    }
}