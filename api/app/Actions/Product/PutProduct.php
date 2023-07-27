<?php

namespace App\Actions\Product;

use App\Models\ProductOrService;

class PutProduct
{
    public function execute($request, $productID)
    {
        $product = ProductOrService::where('ProductID','=',$productID)->get();
        
        if ($product !== null) {
            try
            {
                $product->content = $request->input('content');
                $product->save();
                
                return [
                    'isSuccess' => true,
                    'data' => $product,
                    'message' => 'Product was successfully updated',
                    'statusCode' => 200
                ];
            }
            catch (\Throwable $th)
            {
                return [
                    'isSuccess' => false,
                    'data' => [],
                    'message' => $th->getMessage(),
                    'statusCode' => 500
                ];
            }
            
        }
        else
        {
            return [
                'isSuccess' => false,
                'data' => [],
                'message' => 'Product was not found to be updated',
                'statusCode' => 404
            ];
        }
    }
}