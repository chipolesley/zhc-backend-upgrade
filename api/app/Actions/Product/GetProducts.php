<?php
 
 namespace App\Actions\Product;

 use App\Models\ProductOrService;

class GetProducts
{
   public function execute()
   {
        $products = ProductOrService::all();
        
        if($products)
        {
            return [
                'isSuccess' => true,
                'data' => $products,
                'message' => 'Products were loaded successfully',
                'statusCode' => 200
            ];
        }
        else
        {
            return [
                'isSuccess' => false,
                'data' => $products,
                'message' => 'Products were not found',
                'statusCode' => 404
            ];
        }
    }
}