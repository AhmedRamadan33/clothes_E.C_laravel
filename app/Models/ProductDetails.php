<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetails extends Model
{
    use HasFactory;
    protected $fillable = ['product_id','size','color','image'];
    protected $table = 'product_details';

    public function product(){
    return $this->belongsTo(Products::class);
    }
}
