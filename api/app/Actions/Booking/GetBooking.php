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
            if ($booking !== null) {
                return [
                    'isSuccess' => true,
                    'data' => $booking,
                    'message' => 'Booking was loaded successfully',
                    'statusCode' => 200
                ];
            }
            else
            {
                return [
                    'isSuccess' => false,
                    'data' => $booking,
                    'message' => 'Booking was not found',
                    'statusCode' => 404
                ];
            }
        } catch (\Throwable $th) {
            
            return [
                'isSuccess' => false,
                'data' => $booking,
                'message' => $th->getMessage(),
                'statusCode' => 500
            ];
        }
    }
}