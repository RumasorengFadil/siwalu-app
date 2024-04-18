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

    public function getLaundry($id){
        return view("/detailLaundry/detailLaundry",[
            "laundry" => Laundry::getLaundry($id),
        ]);
    }

    public function postLaundry(){
        return view();
    }
}
