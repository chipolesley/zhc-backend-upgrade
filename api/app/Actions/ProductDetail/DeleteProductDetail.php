<?php

namespace App\Actions\ProductDetail;

use App\Models\ProductDetail;

class DeleteProductDetail
{
    public function execute($productDetailID)
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