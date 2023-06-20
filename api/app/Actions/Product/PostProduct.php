<?php

namespace App\Actions\Product;

use App\Models\ProductOrService;

class PostProduct
{
    public function execute($request)
    {
        try
        {
            $product = new ProductOrService();
            $product->content = $request->input('content');
            $product->save();

            $response = [
                'product' => $product,
                'message' => 'Product was successfully created'
            ];
        }
        catch(\Throwable $th)
        {
            $response = [
                'product' => [],
                'message' => $th
            ];
        }
        
        return $response;
    }
}