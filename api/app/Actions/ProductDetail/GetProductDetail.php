<?php

namespace App\Actions\ProductDetail;

use App\Models\ProductDetail;

class GetProductDetail
{
    public function execute($productDetailID)
    {
        $response = [];
        $productDetail = ProductDetail::with('Booking',
                                            'ProductOrService',
                                            'TransferTo',
                                            'TransferFrom',
                                            'Pilot',
                                            'Aircraft'
                                        )
                                        ->where('BookingID', '=', $productDetailID)
                                        ->get();
        if ($productDetail)
        {
            $this->response = [
            'productDetail' => $productDetail,
            'message' => 'Product detail was loaded successfully'
            ];
        }
        else
        {
            $this->response = [
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
            $this->response= [
            'productDetail' => $productDetail,
            'message' => 'Product detail loaded successfully'
            ];
        }
        else
        {
            $this->response= [
            'productDetail' => [],
            'message' => 'productDetail not found'
            ];
        }

        return $this->response;
    }
}