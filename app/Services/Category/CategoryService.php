<?php

namespace App\Services\Category;

interface CategoryService
{   
   /**
    * Get All Category Products
    *
    * @return void
    */
   public function getAllCategory();
   
   /**
    * Get Category By Slug
    *
    * @return void
    */
   public function getCategoryBySlug($slug);
}
?>