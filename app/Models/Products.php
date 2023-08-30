<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $fillable = ['name','description','image','price','discount_price','quantity','category_id'];
    protected $table = 'products';

    public function category(){
        return $this->belongsTo(Categories::class, 'category_id');
    }

    public function ProductDetails(){
        return $this->hasMany(ProductDetails::class, 'parent_id');
    }
}
