<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_outs extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        "product_id",
        'customer_id',
        "qty",
        "date",
    ];


    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function customer(){
        return $this->belongsTo(Customers::class);
    }
}
