<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laundry;
use App\Models\Applicant;
use App\Models\User;

use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function renderDashboardView()
    {
        return view('admin.index');
    }
    public function renderAccLaundryView()
    {
        return view('admin.accLaundryView', [
            'user' => auth()->user(),
            'applicants' => Applicant::getApplicants(),
        ]);
    }
    public function renderAddLaundryView()
    {
        return view('admin.addLaundryView');
    }
    public function renderUpdateLaundryView()
    {
        return view('admin.updateLaundryView',[
            "laundries" => Laundry::getLaundries()
        ]);
    }
    public static function renderFormUpdateLaundryView($id){
        return view('admin.formUpdateLaundryView',[
            "laundry" => Laundry::getLaundry($id)
        ]);
    }
    public static function postFormUpdateLaundryView(Request $request){

        $validate = $request->validate([
            "gambar" => 'required|image|mimes:jpeg,png,jpg|max:2048',
            "name" => "required",
            "location" => "required",
            "description" => "required",
            "service" => "required",
            "harga" => "required",
            "number",
            "whatsappNumber" => "required",
            "number",
        ]);

        Laundry::updateLaundry($request);

        return redirect()->route('updateLaundry.show');
    }
    public function renderDeleteLaundryView()
    {
        return view('admin.deleteLaundryView');
    }
    public function postLaundry(Request $request)
    {
        $request["id-admin"] = auth()->user()->only(['id'])['id'];
        $request["id-mitra"] = null;


        $validator = $request->validate([
            "gambar" => 'required|image|mimes:jpeg,png,jpg|max:2048',
            "name" => "required",
            "location" => "required",
            "description" => "required",
            "service" => "required",
            "harga" => "required",
            "number",
            "whatsappNumber" => "required",
            "number",
        ]);

        //Mengambil Input
        $image = $request->gambar;
        $fileName = time() . "." . $image->getClientOriginalName();
        $location = public_path("uploads");

        //Menyimpan gambar di lokal
        $image->move($location, $fileName);

        //Memasukan nama file ke request
        $request["filename"] = $fileName;

        //Upload data laundry ke database
        Laundry::postLaundry($request);

        return redirect()->back();
    }
    public function rejectApplicant(Request $request)
    {
        Applicant::updates($request->id_applicant, "status", "denied");
        return redirect()->back();
    }
    public function acceptApplicant(Request $request)
    {
        
        $applicant = Applicant::getApplicant($request->id_applicant);
        Laundry::postLaundry([
            "id-admin" => $request->id_admin,
            "id-mitra" => $applicant->user->id,
            "name" => $applicant->nama,
            "location" => $applicant->alamat,
            "whatsappNumber" => $applicant->nomor_telp,
            "description" => $applicant->deskripsi,
            "pakaian" => $applicant->jenis_cucian[0],
            "service" => $applicant->jenis_layanan,
            "sepatu" => $applicant->jenis_cucian[1],
            "harga" => $applicant->harga,
            "filename" => $applicant->foto_laundry,
        ]);
        User::updates($applicant->user->id, "role", "laundry");
        Applicant::updates($request->id_applicant, "status", "accept");
        return redirect()->back();
    }
}
