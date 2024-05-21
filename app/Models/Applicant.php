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

    protected $casts = [
        'jenis_layanan' => 'array',
        'jenis_cucian' => 'array',
    ];


    static public function postApplicant($request)
    {
        Applicant::create([
            "id_user" => $request["id_user"],
            "id_admin" => $request["id_admin"] ?? null,
            "nama" => $request["name"],
            "alamat" => $request["location"],
            "nomor_telp" => $request["whatsappNumber"],
            "deskripsi" => $request["description"],
            "jenis_layanan" => $request["service"],
            "jenis_cucian" => [$request["pakaian"] ?? null, $request["sepatu"] ?? null],
            "harga" => $request["harga"],
            "status" => "waiting",
            "foto_ktp" => $request["inputFotoKtp"]->filename,
            "foto_laundry" => $request["inputFotoLaundry"]->filename,
        ]);
    }
}
