<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    /**
     * guarded
     *
     * @var array
     */
    protected $guarded = ['id'];
        
    /**
     * Get the product category that owns the product.
     */
    public function productCategory(){
        return $this->belongsTo(ProductCategory::class, "product_category_id");
    }
    
    /**
     * many-to-many relations from the products table and the users table to the orders table
     *
     * @return void
     */
    public function users(){
        return $this->belongsToMany(User::class, 'orders', 'product_id', 'user_id')->withTimestamps()->withPivot(['id','status']);
    }
}
