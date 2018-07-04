<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdSpecifi extends Model
{
    protected $table = "prod_specifi";
    protected $fillable = ['product_id', 'prod_color_id', 'prod_size_id','quantity', 'image'];

    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id');
    }

    public function color()
    {
        return $this->belongsTo('App\Color', 'prod_color_id');
    }

    public function size()
    {
        return $this->belongsTo('App\Size', 'prod_size_id');
    }
}
