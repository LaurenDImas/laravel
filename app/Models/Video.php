<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'title',
        'path',
    ];

    public function tags(){
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
