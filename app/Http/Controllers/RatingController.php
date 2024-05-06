<?php

namespace App\Http\Controllers;
use App\Models\Rating;
use App\Models\Laundry;
use Illuminate\Http\Request;

class RatingController extends Controller
{

    public function renderRatingLaundryView($id, Request $request){
        // dd($request->session()->all()["user"]);
        return view("/ratingLaundry/ratingLaundryView", [
            "laundry" => Laundry::getLaundry($id),
            "user_id" => auth()->user()->only(['id'])['id']
        ]);
    }
    
    public function postRatingLaundry($id,Request $request){
        // dd($request);
        $validate = $request->validate([
            "score" => "required",
            "input-user-id" => "required",
            "input-laundry-id" => "required",
            "reason" => "required"
        ]);
        
        Rating::postRatingLaundry($validate);

        return redirect()->route("detailLaundry", [
            "id" => $id
        ])->withErrors($validate);
    }
}
