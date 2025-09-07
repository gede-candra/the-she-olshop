<?php
namespace App\Services\Category;

use App\Repositories\Category\CategoryRepository;
use Log;

class CategoryServiceImplement implements CategoryService
{
   private $categoryRepository;

   /**
    * __construct
    *
    * @param  mixed $categoryRepository
    * @return void
    */
   public function __construct(CategoryRepository $categoryRepository)
   {
      $this->categoryRepository = $categoryRepository;
   }

   /**
    * Get Random Category Products
    *
    * @return object
    */
   public function getRandomProductCategories()
   {
      try {
         $categories = $this->categoryRepository->getRandomProductCategories();

         return [
            'success' => true,
            'code'    => 200,
            'message' => 'Berhasil mengambil kategori produk acak',
            'data'    => $categories,
         ];
      }
      catch (\Exception $e) {
         Log::error('Error fetching random product categories: ' . $e->getMessage());
         
         return [
            'success' => false,
            'code'    => 500,
            'message' => 'Gagal mengambil kategori produk acak',
            'data'    => null,
         ];
      }
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