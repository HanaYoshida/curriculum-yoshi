<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DisplayController extends Controller
{
    public function index() {
        return view('top_page');
    }
    public function mypage() {
        return view('mypage');
    }
   
}
