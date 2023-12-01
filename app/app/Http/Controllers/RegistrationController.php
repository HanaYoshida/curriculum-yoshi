<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function userEditForm() {
        return view('user_edit')
             ->with('user', Auth::user());
    }
    public function userEdit(Request $request) {
        $user = Auth::user();
        $columns = ['name', 'user_name', 'email'];
        foreach($columns as $column) {
            $user->$column = $request->$column;
        }
        Auth::user()->save();
        return redirect('/');
    } 


}
