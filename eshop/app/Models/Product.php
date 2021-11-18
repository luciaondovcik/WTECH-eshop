<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function brands(){
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function categories(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}
