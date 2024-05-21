<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Applicant;

class ApplicantController extends Controller
{
    //function : for render register Mitra view or page
    public function renderRegisterMitraView()
    {
        $user = auth()->user();
        $applicant = Applicant::all()
            ->where("id_user", $user->id)
            ->first();

        return view(
            'register/mitraRegistrationView',
            [
                'user' => $user,
                'applicant' => $applicant
            ]
        );
    }

    //function : register the mitra
    public function registerMitra(Request $request)
    {

        //variabel : validate the data
        $validate = $request->validate([
            "id_user" => "required",
            "name" => "required|max:30",
            "location" => "required",
            "description" => "required",
            "service" => "required",
            "harga" => "required",
            "whatsappNumber" => "required",
            "inputFotoLaundry" => "required",
            "inputFotoKtp" => "required",
        ]);

        //Menyimpan gambar di lokal dan mendefinisikan nama baru
        $request->inputFotoLaundry->filename = upload($request->inputFotoLaundry);
        $request->inputFotoKtp->filename = upload($request->inputFotoKtp);

        //Upload data laundry ke database
        Applicant::postApplicant($request->all());


        return redirect()->back();
    }
}
