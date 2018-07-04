<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $table = "prod_size";
    protected $primaryKey = 'size_id';
    protected $fillable = ['value'];

    public function product()
    {
        return $this->hasMany('App\ProdSpecifi', 'prod_size_id', 'size_id');
    }
}
