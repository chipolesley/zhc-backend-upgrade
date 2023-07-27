<?php

namespace App\Actions\Product;

use App\Models\ProductOrService;

class GetProductPagination
{
    public function execute($request)
    {
        $currProductID = $request->input('ProductID');
        if($request->input('first'))
        {
            $product = ProductOrService::OrderBy('ProductID','asc')->first();
        }
        elseif($request->input('last'))
        {
            $product = ProductOrService::OrderBy('ProductID','desc')->first();
        }
        elseif($request->input('prior'))
        {
            $product = ProductOrService::where('ProductID','<',$currProductID)->orderByDesc('ProductID')->first();
        }
        elseif($request->input('next'))
        {
            $product = ProductOrService::where('ProductID','>',$currProductID)->orderBy('ProductID','asc')->first();
        }
        else
        {
            $product = ProductOrService::where('ProductID', '=', $currProductID)->get();
        }
        
        if ($product !== null) {
            return [
                'isSuccess' => true,
                'data' => $product,
                'message' => 'Product was successfully loaded',
                'statusCode' => 200
            ];
        }
        else
        {
            return [
                'isSuccess' => false,
                'data' => [],
                'message' => 'Product paginate was not found',
                'statusCode' => 404
            ];
        }
    }
    
}