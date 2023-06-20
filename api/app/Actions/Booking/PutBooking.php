<?php

namespace App\Actions\Booking;

use App\Models\Booking;

class PutBooking
{
    public function execute($request, $bookingID)
    {
        $booking = Booking::where('BookingID','=',$bookingID)->get();
        if ($booking) {
            try {
                $booking->content = $request->input('content');
                $booking->save();
                
                $response = [
                    'booking' => $booking,
                    'message' => 'Booking was successfully updated'
                ];
            } catch (\Throwable $th) {
                $response = [
                    'booking' => $booking,
                    'message' => 'Booking was not successfully updated'
                ];
                throw $th;
            }
        }
        else
        {
            $response = [
                'booking' => [],
                'message' => 'BookingID'.$bookingID.' was not found'
            ];
        }
        return $response;
    }
}