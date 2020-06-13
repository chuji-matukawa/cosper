<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Review extends Model
{
    public function shops()
    {
        return $this->belongsTo(Shop::class);
    }
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
}
