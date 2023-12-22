<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Sauna;
use App\Review;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReviewData;


class ReviewController extends Controller
{
    public function review(Sauna $sauna, ReviewData $request)
    {
        $review = new Review;
        $review->sauna_id = $sauna->id;
        $review->user_id = Auth::user()->id;

        $columns = ['body'];
        foreach($columns as $column) {
            $review->$column = $request->$column;
        }
        $review->save();
        return back();
    } 

}
