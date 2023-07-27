<?php

namespace App\Actions\Booking;

use App\Models\Booking;

class FindBooking
{
    public function execute($paxName)
    {
        //search for bookings
        $bookings = Booking::with(
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
          ->where('PaxName','Like',$paxName)
          ->orWhere('PaxName', 'like', '%'.$paxName.'%')
          ->orderBy('BookingDate','desc')
          ->limit(10)
          ->get();

        //check if there are any bookings found
        if($bookings !== null)
        {
            return [
                'isSuccess' => true,
                'data' => $bookings,
                'message' => 'Bookings were successfully loaded',
                'statusCode' => 200
            ];
        }
        else
        {
            return [
                'isSuccess' => false,
                'data' => [],
                'message' => 'Bookings where not found',
                'statusCode' => 404
            ];
        }
    }
}