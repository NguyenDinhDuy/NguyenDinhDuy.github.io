<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = "cities";

    public function district(){
        return $this->hasMany(District::class);
    }
}
