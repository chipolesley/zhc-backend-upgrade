<?php

namespace App\Actions\ProductDetail;

use App\Models\ProductDetail;

class GetProductDetails
{
    public function execute($request)
    {
        $aircraftID = $request->input('AircraftID');
        if($aircraftID)
        {
           $productDetails = ProductDetail::with('Booking.Agent',
                                                 'Booking.AgentConsultant',
                                                 'ProductOrService',
                                                 'TransferTo',
                                                 'TransferFrom',
                                                 'Pilot',
                                                 'Aircraft'
                                                )
                                                ->where('ProductID', '!=', 6)
                                                ->where('aircraft', '=', $aircraftID)
                                                ->orderBy('BookingID', 'desc')
                                                ->limit(200)
                                                ->get();
        }else {
           $productDetails = ProductDetail::with('Booking.Agent',
                                                'Booking.AgentConsultant',
                                                'ProductOrService',
                                                'TransferTo',
                                                'TransferFrom',
                                                'Pilot',
                                                'Aircraft'
                                                )
                                                ->where('ProductID','!=',6)
                                                ->orderBy('BookingID','desc')
                                                ->limit(200)
                                                ->get();
        }

        return [
            'productDetails' => $productDetails,
            'message' => 'Product detail loaded successful'
        ];
    }
}