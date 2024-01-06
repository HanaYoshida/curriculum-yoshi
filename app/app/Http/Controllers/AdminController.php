<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use App\Userrequest;
use App\Sauna;
use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class AdminController extends Controller
{
    
    //ユーザーリスト表示
    public function userList(Request $request) {
        $user = new User;
        $search = $request->input('search');
        if (!empty($search)) {
            $get = $user::whereNull('role')->where('name', 'LIKE', "%{$search}%")->orWhere('username','LIKE',"%{$search}%")->get();
        } else {
            $get = $user::whereNull('role')->get()->toArray();
        }
        return view('admin/user_list', [
            'users' => $get,
            'search' => $search,
        ]);
    }

    //ユーザー削除
    public function userDestroy(User $user) {
        $user->delete();
        return redirect('/user_list');
    }

    //サウナリクエストリスト表示
    public function requestList() {
        $userrequest = new Userrequest;
        $get = $userrequest->with('user')->get();
        return view('admin/request_list', [
            'userrequests' => $get,
        ]);
    }
    
    //サウナリクエスト削除
    public function requestDestroy(Userrequest $userrequest) {
        $userrequest->delete();
        return redirect('/request_list');
    }


    
    
}


    
    