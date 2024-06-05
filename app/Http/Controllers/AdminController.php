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
    public static function renderFormUpdateLaundryView($id){
        return view('admin.formUpdatelaundry',[
            "laundry" => Laundry::getLaundry($id)
        ]);
    }
    public function renderUpdateLaundryView()
    {

        return view('admin.updateLaundryView',[
            "laundries" => Laundry::getLaundries()
        ]);
    }
    public static function renderFormUpdateLaundryView($id){
        return view('admin.formUpdatelaundry',[
            "laundry" => Laundry::getLaundry($id)
        ]);
    }
    public static function postFormUpdateLaundryView(Request $request){
        $validate = $request->validate([
            "gambar" => 'image|mimes:jpeg,png,jpg|max:2048',
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

        return view('admin.updateLaundryView', [
            "laundries" => Laundry::getLaundries()
        ]);
    }
    public function renderDeleteLaundryView()
    {
        return view('admin.deleteLaundryView', [
            "laundries" => Laundry::getLaundries()
        ]);
    }
    public function postLaundry(Request $request)
    {
        $request["id-admin"] = auth()->user()->only(['id'])['id'];
        $request["id-mitra"] = null;

        $validator = $request->validate([
            "gambar" => 'image|mimes:jpeg,png,jpg|max:2048',
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
    public static function postFormUpdateLaundryView(Request $request){
        $validate = $request->validate([
            "gambar" => 'image|mimes:jpeg,png,jpg|max:2048',
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

     public static function updateLaundry($request)
    {
        $id = $request->input('input-laundry-id');
        $laundry = self::findOrFail($id);

        // Check if new file is uploaded
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('uploads');
            $image->move($location, $fileName);
            $laundry->foto = $fileName;
        }

        // Update only if the value is different
        //dd($request);
        $laundry->nama = $request["name"] !== $laundry->nama ? $request["name"] : $laundry->nama;
        $laundry->alamat = $request["location"] !== $laundry->alamat ?  $request["location"] : $laundry->alamat;
        $laundry->deskripsi = $request["description"] !== $laundry->deskripsi ? $request["description"] : $laundry->deskripsi;
        $laundry->jenis_layanan = $request["service"] !== $laundry->jenis_layanan ? $request["service"] : $laundry->jenis_layanan;
        $laundry->harga = $request["harga"] !== $laundry->harga ? $request["harga"] : $laundry->harga;
        $laundry->nomor_telp = $request["whatsappNumber"] !== $laundry->nomor_telp ? $request["whatsappNumber"] : $laundry->nomor_telp;

        $jenisCucian = [];
        if ($request->has('pakaian')) {
            $jenisCucian[] = 'Pakaian';
        }

        if ($request->has('sepatu')) {
            $jenisCucian[] = 'Sepatu';
        }
        $laundry->jenis_cucian = $jenisCucian;

        $laundry->save();
    }
}
