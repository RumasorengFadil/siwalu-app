<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    protected $fillable =
        [
            'id_user',
            'id_admin',
            'nama',
            'alamat',
            "nomor_telp",
            "deskripsi",
            "jenis_layanan",
            "jenis_cucian",
            "harga",
            "status",
            "foto_ktp",
            "foto_laundry"
        ];


    static public function postApplicant($request){
        Applicant::create([
            "id_user"=> $request->id_user,
            "id_admin"=> $request->id_admin??null,
            "nama"=> $request->nama,
            "alamat"=> $request->alamat,
            "nomor_telp"=> $request->nomor_telp,
            "deskripsi"=> $request->deskripsi,
            "jenis_layanan"=> $request->jenis_layanan,
            "jenis_cucian"=> $request->jenis_cucian,
            "harga"=> $request->harga,
            "status"=> $request->status,
            "foto_ktp"=> $request->foto_ktp,
            "foto_laundry"=> $request->foto_laundry,
        ]);
    }
}
