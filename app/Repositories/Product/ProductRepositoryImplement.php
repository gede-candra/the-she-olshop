<?php

namespace App\Repositories\Product;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Str;

class ProductRepositoryImplement implements ProductRepository
{
   private $productModel, $categoryModel;

   /**
    * __construct
    *
    * @param  mixed $productModel
    * @return void
    */
   public function __construct(Product $productModel, ProductCategory $categoryModel)
   {
      $this->productModel  = $productModel;
      $this->categoryModel = $categoryModel;
   }

   /**
    * Get product data by id
    *
    * @param  mixed $id
    * @return void
    */
   public function getProductById($id)
   {
      return $this->productModel->findOrFail($id);
   }

   /**
    * Gel all product data
    *
    * @return void
    */
   public function getAllProduct()
   {
      return $this->productModel->all();
   }

   /**
    * Get product data with pagination
    *
    * @return void
    */
   public function getPaginateProduct($page)
   {
      return $this->productModel->orderBy('updated_at', 'desc')->paginate($page);
   }

   /**
    * Get Recomendation Products
    *
    * @return void
    */
   public function getRecomendationProduct()
   {
      return $this->productModel->inRandomOrder()
         ->limit(8)
         ->get()
         ->where('discount', '>', 0.0);
   }

   /**
    * Get Recomendation with Paginate
    *
    * @return void
    */
   public function getRecommendationPaginate()
   {
      return $this->productModel->inRandomOrder()
         ->limit(8)
         ->get()
         ->where('discount', '>', 0.0);
   }

   /**
    * Get Besst Seller Products
    *
    * @return void
    */
   public function getBestSellerProducts()
   {
      return $this->productModel->limit(4)->get()->sortBy(function ($product) {
         $product->users->count();
      });
   }

   /**
    * Get product by slug
    *
    * @param  mixed $slug
    * @return void
    */
   public function getProductBySlug($slug)
   {
      return $this->productModel->where('slug', $slug)->first();
   }

   /**
    * Get Products By Category With Slug
    *
    * @param  mixed $slug
    */
   public function getProductsByCategorySlug($slug)
   {
      $category = $this->categoryModel->where("slug", $slug)->first();

      if ($category) {
         return $this->productModel->with('productCategory')->where("product_category_id", $category->id)->paginate(12);
      }
      else {
         abort(404);
      }

   }

   /**
    * Store / Add product data
    *
    * @param  mixed $request
    * @param  mixed $slug
    * @return void
    */
   public function create($request)
   {


      $product = $this->productModel;

      $product->product_name = $request->product_name;
      $product->slug         = Str::slug($request->product_name);
      $product->category_id  = $request->category_id;
      $product->price        = $request->price;
      $product->stock        = $request->stock;
      $product->discount     = $request->discount / 100;
      $product->picture      = $request->file('picture')->store('products');
      $product->description  = $request->description;

      $product->save();

      if ($product->save()) {
         return redirect(route('admin.produk.index'))->with('success', 'Satu data berhasil ditambahkan');
      }
      else {
         return redirect(route('admin.produk.create'))->with('fail', 'Terjadi kesalahan');
      }
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
      $product = $this->productModel->where('slug', $slug)->first();

      $product->product_name = $request->product_name;
      $product->slug         = Str::slug($request->product_name);
      $product->category_id  = $request->category_id;
      $product->price        = $request->price;
      $product->stock        = $request->stock;
      $product->discount     = $request->discount / 100;
      $product->picture      = $request->file('picture')->store('products');
      $product->description  = $request->description;

      $product->save();

      if ($product->save()) {
         return redirect(route('admin.produk.index'))->with('success', 'Satu data berhasil diubah');
      }
      else {
         return redirect(route('admin.produk.create'))->with('fail', 'Terjadi kesalahan');
      }
   }

   /**
    * Get product count
    *
    * @return int
    */
   public function getProductCount()
   {
      return $this->productModel->count();
   }
}

?>