<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Auth;


class Userrequest extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
}
