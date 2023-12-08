<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use App\Userrequest;
use App\Sauna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //管理者ページ表示
    public function admin() {
        return view('admin/admin_page');
    }
    //管理者権限ユーザーリスト表示
    public function userList() {
        $user = new User;
        $get = $user::whereNull('role')->get()->toArray();
        return view('admin/user_list', [
            'users' => $get,
        ]);
    }
    //ユーザー削除
    public function userDestroy(int $id) {
        $user = User::find($id);
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
    public function requestDestroy(int $id) {
        $userrequest = Userrequest::find($id);
        $userrequest->delete();
        return redirect('/request_list');
    }
    //サウナ登録
    public function saunaPost() {
        return view('admin/sauna_post');
    }
    public function saunaPostForm(Request $request) {
        $sauna = new Sauna;
        $columns = ['name', 'address', 'closed', 'url', 'temperature'];
        foreach($columns as $column) {
            $sauna->$column = $request->$column;
        }
        $sauna->save();
        return redirect('/admin_page');
    }

    //サウナ施設リスト表示
    public function saunaList() {
        $sauna = new Sauna;
        $get = $sauna->all()->toArray();
        return view('admin/sauna_list', [
            'saunas' => $get,
        ]);
    }
    //サウナページ表示
    public function saunaPage($id) {
        $sauna = Sauna::find($id);
        return view('/sauna_page', [
            'sauna' => $sauna,
        ]);
    }
    //サウナ情報編集
    public function saunaEditForm($id) {
        $sauna = Sauna::find($id);
        return view('admin/sauna_edit', [
            'sauna' => $sauna,
        ]);
    }
    public function saunaEdit($id, Request $request) {
        $sauna = Sauna::find($id);
        $columns = ['name', 'address', 'closed', 'url', 'temperature'];
        foreach($columns as $column) {
            $sauna->$column = $request->$column;
        }
        $sauna->save();
        return redirect('/sauna_list');
    }
    //サウナ情報削除
    public function saunaDestroy(int $id) {
        $sauna = Sauna::find($id);
        $sauna->delete();
        return redirect('/sauna_list');
    }
    
    
}


    
    