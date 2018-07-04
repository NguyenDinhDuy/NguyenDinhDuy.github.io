<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $table = "order_product";
    protected $primaryKey = 'id';
    protected $fillable = ['order_id', 'product_id', 'qty', 'price', 'options'];

}

