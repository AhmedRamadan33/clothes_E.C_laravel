<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
    protected $fillable = ['order_id','prod_id','prod_qty' ,'price'];
    protected $table = 'orders_details';

    public function order(){
        return $this->belongsTo(Order::class,'order_id','id');
    }
    public function product(){
        return $this->belongsTo(Products::class,'prod_id','id');
    }

}
