<?php
namespace App\Services\Product;

interface ProductServiceInterface
{
    public function createProduct($request);
    public function retrieveProducts();
    public function retrieveProduct($productID);
    public function paginateProduct($request);
    public function updateProduct($request, $productID);
    public function removeProduct($productID);
}