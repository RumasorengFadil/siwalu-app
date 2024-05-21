<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    static public function getApplicants(){
        return collect(Applicant::all());
    }

    static public function getApplicant($id_applicant){
        return Applicant::find($id_applicant);
    }
    static public function getFirstApplicant($id_user){
        return Applicant::all()
        ->where("id_user", $id_user)
        ->last();
    }
    static public function updates($id_applicant, $column, $value){
        $applicant = Applicant::find($id_applicant);
        $applicant[$column] = $value;

        $applicant->save();
        return Applicant::find($id_applicant);
    }


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, "id", "id");
    }
}
