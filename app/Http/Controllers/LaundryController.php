<?php

namespace App\Http\Controllers;
use App\Models\Laundry;
use App\Models\User;
use App\Models\Favorite;
use Illuminate\Http\Request;

class LaundryController extends Controller
{
    public function renderHomeView(){
        // Laundry::postLaundry();
        // User::registerAdmin();

        return view("/home/home",[
            "laundries" => Laundry::getLaundries()
        ]);
    }

    public function renderDetailLaundryView($idLaundry){
        $idUser = auth()->user()->only("id")["id"];
        
        Favorite::getFavorite($idUser, $idLaundry);
        return view("/detailLaundry/detailLaundry",[
            "laundry" => Laundry::getLaundry($idLaundry),
            "ratings" => Laundry::getLaundry($idLaundry)->ratings
        ]);
    }

    
}
