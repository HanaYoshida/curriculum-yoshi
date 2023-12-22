<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use App\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserEdit;
use App\Http\Requests\UserRequestData;

class RegistrationController extends Controller
{
    //アカウント情報変更表示
    public function userEditForm() {
        return view('user_edit')
             ->with('user', Auth::user());
    }

    //アカウント情報変更登録
    public function userEdit(UserEdit $request) {
        $user = Auth::user();
        $columns = ['name', 'username', 'email', 'profile'];
        foreach($columns as $column) {
            $user->$column = $request->$column;
        }

        $updateUser = $request->all();
        if ($request->profile != null) {
            $file_name = $request->profile->getClientOriginalName();
            $profileImagePath = $request->profile->storeAs('public', $file_name);
            $updateUser['profile'] = $profileImagePath;
            $user->profile = basename($profileImagePath);
        }
        $loginUser = Auth::user();
        $loginUser->fill($updateUser)->save();
        return redirect()->route('user.edit', Auth::user());
    } 

    //アカウント情報削除(物理削除)
    public function DeleteComp() {
        $user = Auth::user();
        $user->delete();
        return view('/user_delete_comp');
    }

    //サウナリクエスト登録
    public function UserRequest() {
        return view('request_form');
    }    
    public function UserRequestForm(UserRequestData $request) {
        $userrequest = new Userrequest;
        $columns = ['saunaname', 'address', 'url'];
        foreach($columns as $column) {
            $userrequest->$column = $request->$column;
        }
        Auth::user()->userrequest()->save($userrequest);
        return view('/request_comp');
    } 
}
