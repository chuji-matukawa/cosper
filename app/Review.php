<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Review extends Model
{
    public function shops()
    {
        return $this->belongsTo(Shop::class);
    }
}
