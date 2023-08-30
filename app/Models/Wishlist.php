<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','prod_id'];
    protected $table = 'wishlist';


    public function user(){
        return $this->belongsTo(user::class,'user_id');
    }

    public function product(){
        return $this->belongsTo(Products::class,'prod_id','id');
    }
}
