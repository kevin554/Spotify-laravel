<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function songs()
    {
        return $this->hasMany(Song::class);
    }
}
