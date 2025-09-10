<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
      'street_name',
      'city_name'
    ];

    public function addressable(){
        return $this->morphTo();
    }
}
