<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        "category_id",
        'name',
        "price",
        "qty",
    ];

    public function category(){
        return $this->belongsTo(Categories::class);
    }
    public function Product_out(){
        return $this->hasMany(Product_outs::class,"product_id","id");
    }

    public function Product_in(){
        return $this->hasMany(Product_in::class,"product_id","id");
    }

}
