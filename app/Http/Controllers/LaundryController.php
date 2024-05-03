<?php

namespace App\Http\Controllers;
use App\Models\Laundry;
use Illuminate\Http\Request;

class LaundryController extends Controller
{
    public function renderHomeView(){
        // Laundry::postLaundry();
        return view("/home/home",[
            "laundries" => Laundry::getLaundries()
        ]);
    }

    public function renderDetailLaundryView($id){
        return view("/detailLaundry/detailLaundry",[
            "laundry" => Laundry::getLaundry($id),
            "ratings" => Laundry::getLaundry($id)->ratings
        ]);
    }

    
}
