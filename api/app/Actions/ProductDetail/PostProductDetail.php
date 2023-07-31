<?php

namespace App\Actions\ProductDetail;

use App\Models\ProductDetail;

class PostProductDetail
{
    public function execute($request)
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
}