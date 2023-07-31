<?php

namespace App\Services\Product;

/** Actions Import*/
use App\Actions\Product\PutProduct;
use App\Actions\Product\GetProduct;
use App\Actions\Product\PostProduct;
use App\Actions\Product\GetProducts;
use App\Actions\Product\DeleteProduct;
use App\Actions\Product\GetProductPagination;

class ProductService implements ProductServiceInterface
{

    public function __construct(
        protected PutProduct $putProductAction,
        protected PostProduct $postProductAction,
        protected DeleteProduct $deleteProductAction,
        protected GetProduct $getProductAction,
        protected GetProducts $getProductsAction,
        protected GetProductPagination $getProductPaginationAction,
    ){}

    public function createProduct($request)
    {
        return $this->postProductAction->execute($request);
    }

    public function retrieveProducts()
    {
        return $this->getProductsAction->execute();
    }

    public function retrieveProduct($productID)
    {
        return $this->getProductAction->execute($productID);
    }

    public function paginateProduct($request)
    {
        return $this->getProductPaginationAction->execute($request);
    }

    public function updateProduct($request, $productID)
    {
        return $this->putProductAction->execute($request, $productID);
    }

    public function removeProduct($productID)
    {
        return $this->deleteProductAction->execute($productID);
    }
}