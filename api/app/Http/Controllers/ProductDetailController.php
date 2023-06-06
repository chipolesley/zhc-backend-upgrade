<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductDetail;
use App\Services\ProductDetail\ProductServiceInterface as iProductService;


class ProductDetailController extends Controller
{
    public function __construct (
        protected iProductService $iProductService
    ){}
    
    public function postProductDetail(Request $request)
    {
        $productDetail = $this->iProductService->createProductDetail($request);
        return response()->json($productDetail, 201);
    }

    public function getProductDetails(Request $request)
    {
        $productDetails = $this->iProductService->getProductDetails($request);
        return response()->json($productDetails, 200);
    }

    public function getProductDetail(Request $request, $productDetailID)
    {
        $productDetail = $this->iProductService->getProductDetail($request, $productDetailID);
        return response()->json($productDetail, 200);
    }

    public function paginateProductDetail(Request $request)
    {
        $productDetail = $this->iProductService->paginateProductDetail($request);
        return response()->json($productDetail, 200);
    }

    public function putProductDetail(Request $request, $productDetailID)
    {
        $productDetail = $this->iProductService->putProductDetail($request, $productDetailID);
        return response()->json($productDetail, 200);
    }

    public function deleteProductDetail($productDetailID)
    {
        $productDetail = $this->iProductService->deleteProductDetail($productDetailID);
        return response()->json($productDetail, 200);
    }
}
