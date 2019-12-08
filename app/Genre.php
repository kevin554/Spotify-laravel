<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{

    public function artists()
    {
        return $this->hasMany(Artist::class);
    }
}
