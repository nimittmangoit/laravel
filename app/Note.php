<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    // notes realtionship with user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // relationship of note with tags
    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
}
