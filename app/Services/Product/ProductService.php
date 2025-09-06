<?php

namespace App\Services\Product;

interface ProductService
{   
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
    * Get Paginate Product With Where Condition
    *
    * @param  mixed $page
    * @return void
    */
   public function getPaginateProductWhere($column, $value, $page);
   
   /**
    * Get Recomendation Products
    *
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
     * @return void
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
     * @return void
     */
    public function update($request, $slug);
  }
?>