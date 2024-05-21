<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laundry;
use App\Models\Applicant;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function renderDashboardView(){
        return view('admin.index');
    }
    public function renderAccLaundryView(){
        return view('admin.accLaundryView', [
            'user' => auth()->user(),
            'applicants'=> Applicant::getApplicants(),
        ]);
    }
    public function renderAddLaundryView(){
        return view('admin.addLaundryView');
    }
    public function renderUpdateLaundryView(){
        return view('admin.updateLaundryView');
    }
    public function renderDeleteLaundryView(){
        return view('admin.deleteLaundryView');
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
    public function rejectApplicant(Request $request){
        Applicant::updates($request->id_applicant, "status", "denied");
        return redirect()->back();
    }
    public function acceptApplicant(Request $request){

        User::updates($request->id_user, "role","laundry");
        Applicant::updates($request->id_applicant, "status", "accept");
        return redirect()->back();
    }
}
