<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use App\Userrequest;
use App\Sauna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DisplayController extends Controller
{
    public function index() {
        $sauna = new Sauna;
        $get = $sauna->limit(3)->orderBy('created_at', 'desc')->get()->toArray();
        return view('top_page', [
            'saunas' => $get,
        ]);
    }
    public function mypage() {
        return view('mypage');
    }
    
    public function DeleteConf() {
        return view('user_delete_conf');
    }
    
   
}
