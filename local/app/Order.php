<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";
    protected $primaryKey = 'id';
    protected $fillable = ['user_id', 'bill_email', 'bill_code', 'bill_name', 'bill_payment', ' bill_phone', ' bill_discount',
        'bill_discount_code', 'status', 'subtotal', 'ship_price', 'total', 'bill_note'];

    public function products()
    {
        return $this->belongsToMany('App\Product', 'order_product', 'order_id', 'product_id')->withPivot('qty', 'price', 'options');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function history()
    {
        return $this->hasMany(History::class);
    }
}
