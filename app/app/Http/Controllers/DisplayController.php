<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use App\Userrequest;
use App\Sauna;
use App\Like;
use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DisplayController extends Controller
{
    //トップページ表示
    public function index(Request $request) {
        $sauna = new Sauna;
        $search = $request->input('search');
        if (!empty($search)) {
            $get = $sauna->orderBy('created_at', 'desc')->where('saunaname', 'LIKE', "%{$search}%")->orWhere('address','LIKE',"%{$search}%")
            ->paginate(6);
        } else {
            $get = $sauna->orderBy('created_at', 'desc')->paginate(6);
        }
        return view('top_page', [
            'saunas' => $get,
            'search' => $search,
        ]);
    }

    //サウナページ表示
    public function saunapage(Sauna $sauna) {
        if(Auth::check()) {
            $like = Like::where('sauna_id', $sauna->id)->where('user_id', auth()->user()->id)->first();
            return view('sauna_page', [
                'sauna' => $sauna,
                'like' => $like,
            ]);
        } else {
            return view('sauna_page', [
                'sauna' => $sauna,
            ]);
        }
    }
    
    //ユーザー削除確認ページ表示
    public function DeleteConf() {
        return view('user_delete_conf');
    }
    
    //イイネ一覧
    public function LikeList() {
      
        return view('like_list');
    }
}
