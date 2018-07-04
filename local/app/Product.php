<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";
    protected $primaryKey = 'prod_id';
    protected $fillable = ['prod_name', 'prod_code', 'prod_slug', 'prod_thumbnail', 'prod_price', 'promotion_price', 'prod_description', 'prod_featured', 'prod_cate'];

    public function category()
    {
        return $this->belongsTo('App\Category', 'prod_cate', 'prod_id');
    }

    public function prod_specifi()
    {
        return $this->hasMany('App\ProdSpecifi', 'product_id', 'prod_id');
    }

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function image()
    {
        return $this->hasMany(Image::class);
    }
}
