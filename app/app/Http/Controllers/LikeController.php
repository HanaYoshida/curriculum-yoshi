<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Like;
use App\Sauna;
use Illuminate\Support\Facades\Auth;


class LikeController extends Controller
{
    public function like(int $id, Request $request){
        $sauna = Sauna::find($id);
        $like = new Like();
        $like->sauna_id = $sauna->id;
        $like->ip = $request->ip();
        if(Auth::check()){
            $like->user_id = Auth::user()->id;
        }
        $like->save();
        return back();
    }
    public function unlike(int $id, Request $request){
        $sauna = Sauna::find($id);
        $user = $request->ip();
        $like = Like::where('sauna_id', $sauna->id)->where('ip', $user)->first();
        $like->delete();
        return back();
    }
}
