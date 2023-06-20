<?php

namespace App\Actions\Product;

use App\Models\ProductOrService;


class GetProduct
{
    public function execute ($productID)
    {
        $product = ProductOrService::where('ProductID', '=', $productID)->get();
        
        if ($product)
        {
            $response = [
                'product' => $product,
                'message' => 'Product was loaded successfully'
            ];
        }
        else
        {
            $response = [
                'product' => [],
                'message' => 'Product was\'nt found'
            ];
        }
        
        return $response;
    }
}