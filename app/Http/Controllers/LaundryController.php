<?php

namespace App\Http\Controllers;
use App\Models\Laundry;

use Illuminate\Http\Request;

class LaundryController extends Controller
{
    public function getLaundries(){
        return view("/home/home",[
            "laundries" => Laundry::getLaundries()
        ]);
    }
}
