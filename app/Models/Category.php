<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Category extends Model
{
    use HasFactory;

    public function parent() {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children() {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function productsViaParent() {
        return $this->hasMany(Product::class);
    }

    public function productsViaChild(){
        return $this->HasManyThrough(Product::class,Category::class,'parent_id','category_id');
    }

    //Return all products linked to a child category or a parent category:
    public function productsViaAll() {
        
        $products = $this->productsViaParent()->with('category')->get()->merge($this->productsViaChild()->with('category')->get());
        
        return $products;
    }


     //Return all products with pagination:
    public function productsWithPagination($first, $perPage) {
        
        $productsWpagination = $this->productsViaParent()->with('category')->skip($first)->take($perPage)->get()->merge($this->productsViaChild()->with('category')->skip($first)->take($perPage)->get());

        return $productsWpagination;
    }

}