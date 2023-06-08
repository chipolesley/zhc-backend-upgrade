<?php

namespace App\Services\ProductDetail;

use App\Models\ProductDetail;

class ProductDetailService implements ProductDetailServiceInterface
{
    public function createProductDetail(Request $request)
    {
        $message = '';
        $productDetail = [];
        try
        {
            $productDetail = new ProductDetail();
            $productDetail->content = $request->input('content');
            $productDetail->save();

            $message = 'Product details was created successfully';
        }
        catch (\Throwable $th)
        {
            $message = th;
            throw $th;
        }
        
        return [
            'productDetail' => $productDetail,
            'message' => $message
        ];
    }

    public function getProductDetails($request)
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

    public function getProductDetail($request, $productDetailID)
    {
        $productDetail = ProductDetail::with('Booking',
                                             'ProductOrService',
                                             'TransferTo',
                                             'TransferFrom',
                                             'Pilot',
                                             'Aircraft'
                                            )
                                            ->where('BookingID', '=', $ProductDetailID)
                                            ->get();
        if ($productDetail)
        {
            $response = [
                'productDetail' => $productDetail,
                'message' => 'Product detail was loaded successfully'
            ];
        }
        else
        {
            $response = [
                'productDetail' => [],
                'message' => 'productDetail not found'
            ];
        }
        return $response;
    }

    public function paginateProductDetail($request)
    {
        $currProductDetailID = $request->input('ProductDetailID');
        if ( $request->input('first'))
        {
            $productDetail = ProductDetail::OrderBy('ID','asc')->first();
        }
        elseif($request->input('last'))
        {
            $productDetail = ProductDetail::OrderBy('ID','desc')->first();
        }
        elseif ($request->input('prior'))
        {
            $productDetail = ProductDetail::where('ID','<',$currProductDetailID)->orderByDesc('ID')->first();
        }
        elseif ($request->input('next'))
        {
            $productDetail = ProductDetail::where('ID', '>', $currProductDetailID)->orderBy('ID','asc')->first();
        }
        else
        {
            $productDetail = ProductDetail::where('ID', '=', $currProductDetailID)->get();
        }

        if ($productDetail)
        {
            $response= [
                'productDetail' => $productDetail,
                'message' => 'Product detail loaded successfully'
            ];
        }
        else
        {
            $response= [
                'productDetail' => [],
                'message' => 'productDetail not found'
            ];
        }

        return $response;
    }

    public function updateProductDetail($request, $productDetailID)
    {
        $productDetail = ProductDetail::where('ID','=',$productDetailID)->get();
        
        if (count($productDetail)!=0) {
            try
            {
                $productDetail->content = $request->input('content');
                $productDetail->save();

                $response = [
                    'productDetail' => $productDetail,
                    'message' => 'Product detail was updated successfully'
                ];
            }
            catch (\Throwable $th)
            {
                $response = [
                    'productDetail' => $productDetail,
                    'message' => $th
                ];
                throw $th;
            }
            
            return $response;
        }
        
        return [
            'productDetail' => [],
            'message' => 'Document not found'
        ];
    }

    public function deleteProductDetail($productDetailID)
    {
        $productDetail = ProductDetail::where('ID','=',$productDetailID)->get();
        
        if($productDetail)
        {
            $productDetail->delete();
            $response = [
                'productDetail' => $productDetailID,
                'message' => 'Product detail was deleted'
            ];
        }
        else
        {
            $response = [
                'productDetail' => [],
                'message' => 'Product detail was not found'
            ];
        }
        
        return $response;
    }
}
