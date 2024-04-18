<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laundry extends Model
{
    use HasFactory;
    // use HasUuids;

    protected $fillable = [
        'id_admin',
        'nama',
        'alamat',
        "nomor_telp",
        "deskripsi",
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
    public static function postLaundry(){
        $jenisLayanan = array(
            0 => "Express Laundry",
            1 => "Regular",
            2 => "Super Kilat"
        );
        Laundry::create([
            "id_admin" => 0,
            "nama" => "Express Laundry",
            "alamat" => "Purwokerto",
            "nomor_telp" => "085244682919",
            "deskripsi" => "Lulu 'n Be Luxury Laundry adalah layanan laundry yang berbasis di Purwokerto, Jawa Tengah, dan telah beroperasi sejak tahun 2012. Mereka menggunakan teknologi canggih dan memiliki tenaga profesional yang siap melayani pelanggan. Lulu 'n Be menawarkan layanan pick-up dan delivery melalui telepon, sehingga pelanggan dapat dengan mudah mengatur antar-jemput pakaian mereka. Dengan fokus pada kualitas dan kepuasan pelanggan, Lulu 'n Be Luxury Laundry adalah pilihan yang tepat untuk kebutuhan laundry Anda",
            "jam_buka" => "7.00",
            "jam_tutup" => "17.00",
            "jenis_layanan" => json_encode($jenisLayanan),
            "harga" => 3000,
            "rating" => 4.9,
            "foto" => "/img/laundry-img.png",
            "lon" => 0,
            "lan" => 0
        ]);
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