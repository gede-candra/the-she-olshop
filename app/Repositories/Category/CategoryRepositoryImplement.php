<?php
namespace App\Repositories\Category;

use App\Models\ProductCategory;

class CategoryRepositoryImplement implements CategoryRepository
{
   private $categoryModel;
   
   /**
    * __construct
    *
    * @param  mixed $categoryModel
    * @return void
    */
   public function __construct(ProductCategory $categoryModel) {
      $this->categoryModel = $categoryModel;
   }
   
   /**
    * Get Random Category Products
    */
   public function getRandomProductCategories()
   {
      return $this->categoryModel->inRandomOrder()->limit(5)->get();
   }
   
   /**
    * Get Category By Slug
    *
    * @param  mixed $page
    * @return void
    */
   public function getCategoryBySlug($slug)
   {
      return $this->categoryModel->with("products")->where("slug","=", $slug)->first();
   }
}
?>