<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $fillable = ['name','image','parent_id'];
    protected $table = 'categories';

    public function child(){
        return $this->hasMany(Categories::class, 'parent_id');
    }
    public function product(){
        return $this->hasMany(Products::class, 'category_id');
    }
}


