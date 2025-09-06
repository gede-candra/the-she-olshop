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
    * Get All Category Products
    */
   public function getAllCategory()
   {
      return $this->categoryModel->all();
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