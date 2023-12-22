<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Auth;

class Review extends Model
{
    public function sauna()
    {
        return $this->belongsTo('App\Sauna');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
