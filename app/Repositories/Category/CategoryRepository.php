<?php

namespace App\Repositories\Category;

interface CategoryRepository
{
   /**
    * Get Random Category Products
    */
   public function getRandomProductCategories();

   /**
    * Get Category By Slug
    *
    * @return void
    */
   public function getCategoryBySlug($slug);
}
?>