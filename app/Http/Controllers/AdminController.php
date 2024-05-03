<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laundry;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function renderAddLaundryView(){
        return view('admin.addLaundryView');
    }
    public function postLaundry(Request $request){
        $request["id-admin"] = auth()->user()->only(['id'])['id'];
        $request["id-mitra"] = null;

        
        dd($request->all());
        $validator = Validator()::make($request->all(), [
            "name" => ["required"],
            "location" => ["required"],
            "description" => ["required"],
            "service" => ["required"],
            "harga" => ["required", "number"],
            "whatsappNumber" => ["required", "number"],
        ]);

        Laundry::postLaundry($request);

        return redirect()->route("addLaundry")
        ->withErrors($validator);
    }
}
