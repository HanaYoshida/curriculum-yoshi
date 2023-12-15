<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use App\Userrequest;
use App\Sauna;
use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DisplayController extends Controller
{
    //トップページ表示
    public function index() {
        $sauna = new Sauna;
        $get = $sauna->orderBy('created_at', 'desc')->get()->toArray();
        return view('top_page', [
            'saunas' => $get,
        ]);
    }
    //サウナページ表示
    public function sauna(int $id) {
        $sauna = Sauna::find($id);
        $user = Auth::user();
        $request = request();
        $ip = $request->ip();
        $like = Like::where('sauna_id', $sauna->id)->where('ip', $ip)->first();
        return view('sauna_page', [
            'sauna' => $sauna,
            'like' => $like,
            'ip' => $ip,

        ]);
    }
    //マイページ表示
    public function mypage() {
        return view('mypage');
    }
    //ユーザー削除確認ページ表示
    public function DeleteConf() {
        return view('user_delete_conf');
    }
    
   
}
