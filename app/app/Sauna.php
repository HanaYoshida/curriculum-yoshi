<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Auth;

class Sauna extends Model
{
    protected $fillable = ['saunaname','address','closed', 'url', 'temperature', 'image'];

    public function user() {
        return $this->belongsTo('App\User');
    }
 
    public function like() {
        return $this->hasMany('App\Like');
    }
    public function review() {
        return $this->hasMany('App\Review');
    }
}
