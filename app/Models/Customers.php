<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'adresse',
        'email',
        'phone'
    ];

    public function Product_out(){
        return $this->hasMany(Product_outs::class,"customer_id","id");
    }
}
