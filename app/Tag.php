<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // relationship of tags with notes
    public function notes()
    {
        return $this->belongsToMany(Note::class)->withTimestamps();
    }
}
