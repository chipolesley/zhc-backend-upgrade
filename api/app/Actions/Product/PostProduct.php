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

            return [
                'isSuccess' => true,
                'data' => $product,
                'message' => 'Product was successfully created',
                'statusCode' => 200
            ];
        }
        catch(\Throwable $th)
        {
            return [
                'isSuccess' => false,
                'product' => [],
                'message' => $th->getMessage(),
                'statusCode' => 500
            ];
        }
    }
}