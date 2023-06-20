<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Product\ProductServiceInterface as iProductService;


class ProductController extends Controller
{
    public function __construct(
       protected iProductService $iProductService
    ){}

    public function createProduct(Request $request)
    {
        $product = $this->iProductService->createProduct($request);
        return response()->json($product, 201);
    }

    public function getProducts()
    {
        $product = $this->iProductService->retrieveProducts();
        return response()->json($product, 200);
    }

    public function getProduct($productID)
    {
        $product = $this->iProductService->retrieveProduct($productID);
        return response()->json($product, 200);
    }

    public function paginateProduct(Request $request)
    {
        $product = $this->iProductService->paginateProduct($request);
        return response()->json($product, 200);
    }

    public function updateProduct(Request $request, $productID)
    {
        $product = $this->iProductService->paginateProduct($request, $productID);
        return response()->json($product, 201);

    }

    public function deleteProduct($productID)
    {
        $product = $this->iProductService->removeProduct($productID);
        return response()->json($product, 201);
    }
}