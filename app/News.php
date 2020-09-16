<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
