<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    private static $tauxTVAplein = 1.2;

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function products_image() {
        return $this->hasOne(Products_image::class);
    }

    // public function categoryParent() {
    //     return $this->belongsTo(Category::class, 'parent_id');
    // }

    public function prixTTC() {
        $prixTTC = $this->price * self::$tauxTVAplein;
        return number_format($prixTTC, 2);
    }

}