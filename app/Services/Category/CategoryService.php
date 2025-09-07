<?php

namespace App\Services\Category;

interface CategoryService
{   
   /**
    * Get Random Category Products
    *
    * @return object
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