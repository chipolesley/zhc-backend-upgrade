<?php

namespace App\Actions\Product;

use App\Models\ProductOrService;

class DeleteProduct
{
    public function execute($ProductID)
    {
        $product = ProductOrService::where('ProductID','=',$ProductID)->get();

        if($product)
        {
            $product->delete();
            
            $response = [
                'product' => $product,
                'message' => 'Product was not found'
            ];
        }
        else
        {
            $response = [
                'product' => [],
                'message' => 'Product was not found'
            ];
        }
        
        return $response;
    }
}