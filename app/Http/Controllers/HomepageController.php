<?php

namespace App\Http\Controllers;

use App\Services\Category\CategoryService;
use App\Services\Product\ProductService;

class HomepageController extends Controller
{
    private $productService, $categoryService;

    /**
     * __construct
     *
     * @param  mixed $productService
     * @param  mixed $categoryService
     * @return void
     */
    public function __construct(ProductService $productService, CategoryService $categoryService)
    {
        $this->productService  = $productService;
        $this->categoryService = $categoryService;
    }

    /**
     * Homepage Index
     *
     */
    public function index()
    {
        $data = [
            "rec_products" => $this->productService->getRecomendationProduct(),
            "best_seller"  => $this->productService->getBestSellerProducts(),
        ];

        return view('apps.homepage', $data);
    }

    public function showRandomProductCategories()
    {
        $response = $this->categoryService->getRandomProductCategories();

        return response()->json([
            'success' => $response['success'],
            'message' => $response['message'],
            'data'    => $response['data'] ?? null,
        ], $response['code']);
    }

    public function showProductsByCategory($slug)
    {
        $data = [
            "product_category" => $this->categoryService->getCategoryBySlug($slug),
            "products"         => $this->productService->getProductsByCategorySlug($slug),
        ];

        return view('apps.products-by-category', $data);
    }

    public function showProductDetail($categoryProduct, $slug)
    {
        $data = [
            "product" => $this->productService->getProductBySlug($slug),
        ];

        return view('apps.product-detail', $data);
    }

    public function showRecommendations()
    {
        $data = [
            "product_categories" => $this->categoryService->getAllCategory(),
            "products"           => $this->productService->getRecommendationPaginate(),
        ];

        return view('apps.product-detail', $data);
    }
}
