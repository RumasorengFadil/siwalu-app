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

        
        $validator = $request->validate([
            "gambar" => 'required|image|mimes:jpeg,png,jpg|max:2048',
            "name" => "required",
            "location" => "required",
            "description" => "required",
            "service" => "required",
            "harga" => "required", "number",
            "whatsappNumber" => "required", "number",
        ]);
        
        //Mengambil Input
        $image = $request->gambar;
        $fileName = time().".".$image->getClientOriginalName();
        $location = public_path("uploads");

        //Menyimpan gambar di lokal
        $image->move($location, $fileName);

        //Memasukan nama file ke request
        $request["filename"] = $fileName;

        //Upload data laundry ke database
        Laundry::postLaundry($request);

        return redirect()->back();
    }
}
