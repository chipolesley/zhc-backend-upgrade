<?php

namespace App\Actions\Product;

use App\Models\ProductOrService;


class GetProduct
{
    public function execute ($productID)
    {
        $product = ProductOrService::where('ProductID', '=', $productID)->get();
        
        if ($product !== null)
        {
            return [
                'isSuccess' => true,
                'data' => $product,
                'message' => 'Product was loaded successfully',
                'statusCode' => 200
            ];
        }
        else
        {
            return [
                'isSuccess' => false,
                'data' => [],
                'message' => 'Product wasn\'t found',
                'statusCode' => 404
            ];
        }
    }
}