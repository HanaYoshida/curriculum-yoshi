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
    public function like(Sauna $sauna, Request $request){     
        $like = new Like();
        $like->sauna_id = $sauna->id;
        $like->user_id = Auth::user()->id;
        $like->save();
        return back();
    }
    public function unlike(Sauna $sauna, Request $request){      
        $user = Auth::user()->id;
        $like = Like::where('sauna_id', $sauna->id)->where('user_id', $user)->first();
        $like->delete();
        return back();
    }
}
