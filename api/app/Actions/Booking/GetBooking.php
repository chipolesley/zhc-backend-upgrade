<?php

namespace App\Actions\Booking;

use App\Models\Booking;


class GetBooking
{
    public function execute ($bookingID)
    {
        $booking = [];
        try {
            //get booking information
            $booking = Booking::with(
                                     'ProductDetail',
                                     'Booking',
                                     'BookingConsultant',
                                     'Nationality',
                                     'Consultant',
                                     'Correspondence',
                                     'Currency',
                                     'ConsultantUpdatedBy',
                                     'Correspondence'
                                    )
                                    ->where('DocType','!=',2)
                                    ->where('IsCashSale','=','0')
                                    ->where('BookingID', $bookingID)
                                    ->get();

            //check if the booking exists
            if ($booking) {
                $response = [
                    'booking' => $booking,
                    'message' => 'Booking was loaded successfully'
                ];
            }
            else
            {
                $response = [
                'booking' => $booking,
                'message' => 'Booking was not found'
                ];
            }
        } catch (\Throwable $th) {
            
            $response = [
                'booking' => $booking,
                'message' => $th
                ];
            throw $th;
        }

        return $response;
    }
}