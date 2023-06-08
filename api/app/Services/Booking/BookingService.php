<?php

namespace App\Services\Booking;

use App\Models\Booking;

class BookingService implements BookingServiceInterface
{
    public function createBooking($request)
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

    public function getBookings()
    {
        try
        {
            //get all bookings with there relationships
            $bookings = Booking::with(
                                      'ProductDetail',
                                      'Agent',
                                      'AgentConsultant',
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
                'bookings' => $bookings,
                'message' => $th
            ];
            throw $th;
        }
        return $response;
    }

    public function searchBookings($paxName)
    {
        //search for bookings
        $bookings = Booking::with(
                                  'ProductDetail',
                                  'Agent',
                                  'AgentConsultant',
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
        if($bookings)
        {
            $response = [
                'bookings' => $bookings,
                'message' => 'Bookings was found'
            ];
        }
        else
        {
            $response = [
                'bookings' => [],
               'message' => 'Bookings where not found'
            ];
        }
       
        return $response;
    }

    public function getBooking($bookingID)
    {
        $booking = [];
        try {
            //get booking information
            $booking = Booking::with(
                                     'ProductDetail',
                                     'Agent',
                                     'AgentConsultant',
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

    public function paginateBooking($request)
    {
        $currBookingID = $request->input('BookingID');

        if($request->input('first'))
        {
            $booking = Booking::with(
                                     'ProductDetail',
                                     'Agent',
                                     'AgentConsultant',
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
                                    'Agent',
                                    'AgentConsultant',
                                    'Nationality',
                                    'Consultant',
                                    'Correspondence',
                                    'Currency',
                                    'ConsultantUpdatedBy',
                                    'Correspondence'
                                    )
                                    ->where('DocType','!=',2)
                                    ->where('IsCashSale','=','0')
                                    -> OrderBy('BookingID','desc')
                                    ->first();
        }
        elseif ($request->input('prior'))
        {
            $booking = Booking::with(
                                     'ProductDetail',
                                     'Agent',
                                     'AgentConsultant',
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
                                     'Agent',
                                     'AgentConsultant',
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
                                     'Agent',
                                     'AgentConsultant',
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

    public function updateBooking($request, $bookingID)
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

    public function deleteBooking($bookingID)
    {
        $booking = Booking::where('BookingID','=',$BookingID)->get();
        if ($booking)
        {
            $booking->delete();
            $response = [
                'booking' => $BookingID,
                'message' => 'Booking was deleted'
            ];
        }
        else
        {
            $response = [
                'booking' => $BookingID,
                'message' => 'Booking was not found'
            ];
        }
        return $response;
    }
}
