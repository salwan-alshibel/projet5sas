<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function category() {

        return $this->belongsTo(Category::class);
    }

    public function products_image() {

        return $this->hasOne(Products_image::class);
    }
}