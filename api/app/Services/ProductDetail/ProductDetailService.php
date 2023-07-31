<?php

namespace App\Services\ProductDetail;

/** Actions Import*/
use App\Actions\ProductDetail\PutProductDetail;
use App\Actions\ProductDetail\GetProductDetail;
use App\Actions\ProductDetail\PostProductDetail;
use App\Actions\ProductDetail\GetProductDetails;
use App\Actions\ProductDetail\DeleteProductDetail;
use App\Actions\ProductDetail\GetProductDetailPagination;

use App\Models\ProductDetail;

class ProductDetailService implements ProductDetailServiceInterface
{
    public function __construct(
        protected PutProductDetail $putProductDetailAction,
        protected PostProductDetail $postProductDetailAction,
        protected DeleteProductDetail $deleteProductDetailAction,
        protected GetProductDetail $getProductDetailAction,
        protected GetProductDetails $getProductDetailsAction,
        protected GetProductDetailPagination $getProductDetailPaginationAction,
    ){}

    public function createProductDetail(Request $request)
    {
        return $this->postProductDetailAction->execute($request);
    }

    public function getProductDetails($request)
    {
        return $this->getProductDetailsAction->execute($request);
    }

    public function getProductDetail($productDetailID)
    {
        return $this->getProductDetailAction->execute($productDetailID);
    }

    public function updateProductDetail($request, $productDetailID)
    {
        return $this->putProductDetailAction->execute($request, $productDetailID);
    }

    public function deleteProductDetail($productDetailID)
    {
        return $this->deleteProductDetailAction->execute($productDetailID);
    }
}
