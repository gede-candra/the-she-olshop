<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\ProductRequest;
use App\Services\Category\CategoryService;
use App\Services\Product\ProductService;

class ProductController extends Controller
{
    private $productService, $categoryService;
    
    /**
     * __construct
     *
     * @param  mixed $productService
     * @return void
     */
    public function __construct(ProductService $productService, CategoryService $categoryService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            "products" => $this->productService->getAllProduct(),
        ];

        return view("the_she.admin_page.products.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            "title"         => "Tambah Data Produk",
            "btn_text"      => "Tambah",
            "categories"    => $this->categoryService->getAllCategory(),
        ];
        
        return view("the_she.admin_page.products.product-input-form", $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        return $this->productService->create($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $data = [
            "title"         => "Ubah Data Produk",
            "btn_text"      => "Ubah",
            "categories"    => $this->categoryService->getAllCategory(),
            "product"       => $this->productService->getProductBySlug($slug),
        ];
        
        return view("the_she.admin_page.products.product-input-form", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $slug)
    {
        return $this->productService->update($request, $slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
