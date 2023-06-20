<?php

namespace App\Actions\Booking;

use App\Models\Booking;

class GetBookingPagination
{
    public function execute($request)
    {
        $currBookingID = $request->input('BookingID');

        if($request->input('first'))
        {
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
                                    ->OrderBy('BookingID','asc')
                                    ->first();
        }
        elseif ($request->input('last'))
        {
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
                                    ->OrderBy('BookingID','desc')
                                    ->first();
        }
        elseif ($request->input('prior'))
        {
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
                                    ->where('BookingID','<',$currBookingID)
                                    ->orderByDesc('BookingID')
                                    ->first();
        }
        elseif ($request->input('next'))
        {
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
                                    ->where('BookingID','>',$currBookingID)
                                    ->orderBy('BookingID','asc')
                                    ->first();
        }
        else
        {
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
                                    ->where('IsCashSale','=','0')->where('BookingID', '=', $currBookingID)
                                    ->get();
        }

        if ($booking)
        {
            $response = [
                'booking' => $booking,
                'message' => 'Booking was loaded successfully'
                ];
        }
        else
        {
            $response = [
                'booking' => [],
                'message' => 'Booking not found'
                ];
        }
        return $response;
    }
    
}