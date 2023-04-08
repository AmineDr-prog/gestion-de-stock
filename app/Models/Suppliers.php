<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'adresse',
        'email',
        'contact'
    ];

    public function Product_out(){
        return $this->hasMany(Product_in::class,"supplier_id","id");
    }

}
