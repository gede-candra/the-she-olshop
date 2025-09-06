<?php
namespace App\Services\Category;

use App\Repositories\Category\CategoryRepository;

class CategoryServiceImplement implements CategoryService
{
   private $categoryRepository;
   
   /**
    * __construct
    *
    * @param  mixed $categoryRepository
    * @return void
    */
   public function __construct(CategoryRepository $categoryRepository) {
      $this->categoryRepository = $categoryRepository;
   }
   
   /**
    * Get All Category Products
    *
    * @return void
    */
   public function getAllCategory()
   {
      return $this->categoryRepository->getAllCategory();
   }
   
   /**
    * Get Category By Slug
    *
    * @param  mixed $slug
    * @return void
    */
   public function getCategoryBySlug($slug)
   {
      return $this->categoryRepository->getCategoryBySlug($slug);
   }
}
?>