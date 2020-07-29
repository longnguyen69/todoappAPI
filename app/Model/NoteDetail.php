<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class NoteDetail extends Model
{
    protected $table = 'noteDetails';

    public function note()
    {
        return $this->belongsTo(\App\Model\Note::class);
    }
}
