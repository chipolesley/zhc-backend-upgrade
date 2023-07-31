<?php
namespace App\Services\ProductDetail;

interface ProductDetailServiceInterface
{
    /**
     * @param array $request
     ** @return ProductDetail
     */
    public function createProductDetail($request);

    /**
     * @param array $request
     ** @return ProductDetails
     */
    public function getProductDetails($request);
    
    /**
     * @param array $request
     * @param int $productDetail
     ** @return ProductDetail
     */
    public function getProductDetail($productDetailID);

    /**
     * @param array $request
     ** @return ProductDetail
     */
    public function paginateProductDetail($request);

    /**
     * @param array $request
     * @param int $productDetail
     ** @return ProductDetail
     */
    public function updateProductDetail($request, $productDetailID);

    /**
     * @param int $productDetail
     ** @return ProductDetail
     */
    public function deleteProductDetail($productDetailID);
}
