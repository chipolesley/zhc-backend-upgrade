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
        $product = $this->postProductAction->execute($request);
        return $product;
    }

    public function retrieveProducts()
    {
        $products = $this->getProductsAction->execute();
        return $products;
    }

    public function retrieveProduct($productID)
    {
        $product = $this->getProductAction->execute($productID);
        return $product;
    }

    public function paginateProduct($request)
    {
        $productsPagination = $this->getProductPaginationAction->execute($request);
        return $productsPagination;        
    }

    public function updateProduct($request, $productID)
    {
        $product = $this->putProductAction->execute($request, $productID);
        return $product;
    }

    public function removeProduct($productID)
    {
        $product = $this->deleteProductAction->execute($productID);
        return $product;
    }
}