<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\CanResetPassword;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username', 'profile'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function userrequest(){
        return $this->hasMany('App\Userrequest');
    }
    public function sauna() {
        return $this->hasMany('App\Sauna');
    }
    public function like() {
        return $this->hasMany('App\Like');
    }
    public function review() {
        return $this->hasMany('App\Review');
    }
    public function join_likes_saunas() {
        return $this->hasManyThrough(
            'App\Sauna',    //リレーションして取りたいテーブル
            'App\Like',     //経由するテーブル
            'user_id',      //likesテーブルをusersテーブルと結ぶための外部キー
            'id',           //saunasテーブルの外部キー
            null,           //usersテーブルのローカルキー
            'sauna_id'      //likesとsaunasを結ぶために使うキー
        );
    }
}
