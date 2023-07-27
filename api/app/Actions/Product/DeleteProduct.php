<?php

namespace App\Actions\Product;

use App\Models\ProductOrService;

class DeleteProduct
{
    public function execute($productID)
    {
        $product = ProductOrService::where('ProductID','=',$productID)->get();

        if($product !== null)
        {
            $product->delete();
            
            return [
                'isSuccess' => true,
                'data' => $product,
                'message' => 'Product was deleted',
                'statusCode' => 200
            ];
        }
        else
        {
            return [
                'isSuccess' => false,
                'data' => [],
                'message' => 'Product was not found',
                'statusCode' => 404
            ];
        }
    }
}