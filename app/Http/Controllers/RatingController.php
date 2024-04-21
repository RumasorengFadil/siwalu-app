<?php

namespace App\Http\Controllers;
use App\Models\Rating;
use App\Models\Laundry;
use Illuminate\Http\Request;

class RatingController extends Controller
{

    public function renderRatingLaundryView($id){
        return view("/ratingLaundry/ratingLaundryView", [
            "laundry" => Laundry::getLaundry($id),
        ]);
    }

    public function postRatingLaundry($id,Request $request){
        // dd($request->all());
        
        $validate = $request->validate([
            "score" => "required",
            "input-laundry-id" => "required",
            "reason" => "required"
        ]);
        Rating::postRatingLaundry($request);

        return redirect()->route("detailLaundry", [
            "id" => $id
        ])->withErrors($validate);
    }
}
