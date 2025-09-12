<?php

namespace App\Repositories\Product;

interface ProductRepository
{
    /**
     * Get product by id
     *
     * @param  mixed $id
     * @return void
     */
    public function getProductById($id);

    /**
     * Get all product data
     *
     * @return void
     */
    public function getAllProduct();

    /**
     * Get product data with pagination
     *
     * @param  mixed $page
     * @return void
     */
    public function getPaginateProduct($page);

    /**
     * Get Recomendation Products
     *
     * @param  mixed $column
     * @param  mixed $value
     * @param  mixed $page
     * @return void
     */
    public function getRecomendationProduct();

    /**
     * Get Besst Seller Products
     *
     * @return void
     */
    public function getBestSellerProducts();

    /**
     * Get Products By Slug
     *
     * @param  mixed $slug
     * @return void
     */
    public function getProductBySlug($slug);
    /**
     * Get Products By Category With Slug
     *
     * @param  mixed $slug
     */
    public function getProductsByCategorySlug($slug);

    /**
     * Store / Add product data
     *
     * @param  mixed $request
     * @return void
     */
    public function create($request);

    /**
     * Update product data
     *
     * @param  mixed $request
     * @param  mixed $slug
     * @return void
     */
    public function update($request, $slug);

    /**
     * Get product count
     *
     * @return int
     */
    public function getProductCount();
}