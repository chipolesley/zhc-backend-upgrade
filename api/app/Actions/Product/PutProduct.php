<?php

namespace App\Actions\Product;

use App\Models\ProductOrService;

class PutProduct
{
    public function execute($request, $productID)
    {
        $product = ProductOrService::where('ProductID','=',$productID)->get();
        
        if ($product) {
            try
            {
                $product->content = $request->input('content');
                $product->save();
                
                $response = [
                    'product' => $product,
                    'message' => 'Product was successfully updated'
                ];
            }
            catch (\Throwable $th)
            {
                $response = [
                    'product' => [],
                    'message' => $th
                ];
                throw $th;
            }
            
        }
        else
        {
            $response = [
                'product' => [],
                'message' => 'Product was not found to be updated'
            ];
        }
        return $response;
    }
}