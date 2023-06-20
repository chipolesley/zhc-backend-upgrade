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
            $response = [
                'products' => $products,
                'message' => 'Products were loaded successfully'
            ];
        }
        else
        {
            $response = [
                'products' => $products,
                'message' => 'Products were not found'
            ];
        }
        
        return $response;
    }
}