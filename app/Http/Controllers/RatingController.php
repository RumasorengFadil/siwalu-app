<?php

namespace App\Http\Controllers;
use App\Models\Rating;
use App\Models\Laundry;
use Illuminate\Http\Request;

class RatingController extends Controller
{

    public function renderRatingLaundryView($id, Request $request){
        return view("/ratingLaundry/ratingLaundryView", [
            "laundry" => Laundry::getLaundry($id),
            "user" => $request->session()->all()["user"]
        ]);
    }

    public function postRatingLaundry($id,Request $request){
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
