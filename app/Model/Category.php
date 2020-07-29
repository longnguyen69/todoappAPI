<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    public function note()
    {
        return $this->hasMany(\App\Model\Note::class);
    }
}
