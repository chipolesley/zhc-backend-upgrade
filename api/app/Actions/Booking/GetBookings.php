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
                                    ->first();
            //check if there are any bookings
            if($bookings !== null)
            {
                return [
                    'isSuccess' => true,
                    'data' => $bookings,
                    'message' => 'Bookings where loaded successfully',
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
        catch (\Throwable $th)
        {
            return [
                'isSuccess' => false,
                'data' => [],
                'message' => $th->getMessage(),
                'statusCode' => 500
            ];
        }
    }
}