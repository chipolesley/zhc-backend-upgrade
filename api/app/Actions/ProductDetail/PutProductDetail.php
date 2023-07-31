<?php

namespace App\Actions\ProductDetail;

use App\Models\ProductDetail;

class PutProductDetail
{
    public function execute($request, $productDetailID)
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
}