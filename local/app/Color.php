<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $table = "prod_color";
    protected $primaryKey = 'color_id';
    protected $fillable = ['value', 'slug'];

    public function product()
    {
        return $this->hasMany('App\ProdSpecifi', 'prod_color_id', 'color_id');
    }
}
