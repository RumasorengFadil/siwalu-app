<?php

namespace App\Http\Controllers;
use App\Models\Laundry;
use Illuminate\Http\Request;

class LaundryController extends Controller
{
    public function getLaundries(){
        Laundry::postLaundry();
        return view("/home/home",[
            "laundries" => Laundry::getLaundries()
        ]);
    }

    public function renderDetailLaundryView($id){
        return view("/detailLaundry/detailLaundry",[
            "laundry" => Laundry::getLaundry($id),
        ]);
    }
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
        Laundry::postRatingLaundry($request);

        return view("/detailLaundry/detailLaundry", [
            "laundry" => Laundry::getLaundry($id),
        ])->withErrors($validate);
    }
}
