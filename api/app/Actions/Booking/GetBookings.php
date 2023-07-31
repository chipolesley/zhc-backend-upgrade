<?php
 
 namespace App\Actions\Booking;

 use App\Models\Booking;


class GetBookings
{
   public function execute(){
    try
    {
        //get all bookings with there relationships
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
                                ->OrderBy('BookingID','desc')
                                ->get();
        //check if there are any bookings
        if($bookings)
        {
            $response = [
                'bookings' => $bookings,
                'message' => 'Bookings where loaded successfully'
            ];
        }
        else
        {
            $response = [
                'bookings' => [],
                'message' => 'Bookings where not found'
            ];
        }
    }
    catch (\Throwable $th)
    {
        $response = [
            'bookings' => [],
            'message' => $th
        ];
        throw $th;
    }
    return $response;
    }
}