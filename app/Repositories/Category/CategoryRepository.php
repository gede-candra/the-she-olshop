<?php

namespace App\Repositories\Category;

interface CategoryRepository
{
   /**
    * Get All Category Products
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