<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laundry extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_admin',
        'nama',
        'alamat',
        "nomor_telp",
        "jam_buka",
        "jam_tutup",
        "jenis_layanan",
        "harga",
        "rating",
        "foto",
        "lon",
        "lan"
    ];

    
    public static function getLaundries(){
        return collect(Laundry::all());
    }
    public static function getLaundry($id){
        $laundry = collect(Laundry::all());

        return $laundry->firstWhere("id_laundry", $id);
    }
}
// $laundry = [
//     "id_admin" => 0,
//     "nama" => "Express Laundry",
//     "alamat" => "Purwokerto",
//     "no_telp" => "085244682919",
//     "jam_buka" => "7.00",
//     "jam_tutup" => "17.00",
//     "jenis_layanan" => "Pakaian",
//     "harga" => 3000,
//     "rating" => 4.9,
//     "foto" => "/img/laundry-img.png",
//     "lon" => 0,
//     "lan" => 0
// ]

// $laundry::insert([
//     "id_admin" => 0,
//     "nama" => "Express Laundry",
//     "alamat" => "Purwokerto",
//     "nomor_telp" => "085244682919",
//     "jam_buka" => "7.00",
//     "jam_tutup" => "17.00",
//     "jenis_layanan" => "Pakaian",
//     "harga" => 3000,
//     "rating" => 4.9,
//     "foto" => "/img/laundry-img.png",
//     "lon" => 0,
//     "lan" => 0
// ])