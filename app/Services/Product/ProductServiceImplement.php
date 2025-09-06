<?php

namespace App\Services\Product;

use App\Repositories\Product\ProductRepository;

class ProductServiceImplement implements ProductService
{
   private $productRepository;
   
   /**
    * __construct
    *
    * @param  mixed $productRepository
    * @return void
    */
   public function __construct(ProductRepository $productRepository)
   {
      $this->productRepository = $productRepository;
   }
   
   /**
    * Get all product data
    *
    * @return void
    */
   public function getAllProduct()
   {
      return $this->productRepository->getAllProduct();
   }
   
   /**
    * Get product data with pagination
    *
    * @param  mixed $page
    * @return void
    */
   public function getPaginateProduct($page)
   {
      return $this->productRepository->getPaginateProduct($page);
   }
      
   /**
    * Get Best Seller Product
    *
    * @param  mixed $page
    * @return void
    */
   public function getPaginateProductWhere($column, $value, $page)
   {
      return $this->productRepository->getPaginateProductWhere($column, $value, $page);
   }
      
   /**
    * Get Recomendation Products
    *
    * @return void
    */
   public function getRecomendationProduct(){
      return $this->productRepository->getRecomendationProduct();
   }

   /**
     * Get Besst Seller Products
     *
     * @return void
     */
    public function getBestSellerProducts()
    {
       return $this->productRepository->getBestSellerProducts();
    }

    /**
     * Get Products By Slug
     *
     * @param  mixed $slug
     * @return void
     */
    public function getProductBySlug($slug)
    {
      return $this->productRepository->getProductBySlug($slug);
    }

    /**
     * Get Products By Category With Slug
     *
     * @param  mixed $slug
     * @return void
     */
    public function getProductsByCategorySlug($slug)
    {
      return $this->productRepository->getProductsByCategorySlug($slug);
    }

    /**
     * Store / Add product data
     *
     * @param  mixed $request
     * @return void
     */
    public function create($request){
      return $this->productRepository->create($request);
   }
      
   /**
    * Update product data
    *
    * @param  mixed $request
    * @param  mixed $slug
    * @return void
    */
   public function update($request, $slug)
   {
      return $this->productRepository->update($request, $slug);
   }
}

?>