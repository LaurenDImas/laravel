<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
    ];

    public function address()
    {
        return $this->morphOne(Address::class, 'addressable');
    }
    public function addresses()
    {
        return $this->morphMany(Address::class, 'addressable');
    }
}
