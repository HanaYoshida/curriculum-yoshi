<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail;


class TestMailController extends Controller
{
   

    public function mail(){

    	$data = [];

    	Mail::send('emails.test', $data, function($message){
    	    $message->to('fiore_r_k@yahoo.co.jp', 'Test')
    	    ->subject('This is a test mail');
    	});
    }

}
