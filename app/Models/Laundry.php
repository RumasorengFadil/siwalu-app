<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Laundry extends Model
{

    use HasFactory;
    use HasUuids;

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
    protected $casts = [
        'jenis_layanan' => 'array',
    ];
    public function newUniqueId(): string
    {
        return (string) Uuid::uuid4();
    }
    public function uniqueIds(): array
    {
        return ['id_laundry'];
    }
    public static function getLaundries(){
        return collect(Laundry::all());
    }
    public static function getLaundry($id){
        $laundry = collect(Laundry::all());

        return $laundry->firstWhere("id_laundry", $id);
    }
    public static function postLaundry(){
        $jenisLayanan = array(
            "Express Laundry",
            "Regular",
            "Super Kilat");

        Laundry::create([
            "id_admin" => 0,
            "nama" => "Express Laundry",
            "alamat" => "Purwokerto",
            "nomor_telp" => "085244682919",
            "deskripsi" => "Lulu 'n Be Luxury Laundry adalah layanan laundry yang berbasis di Purwokerto, Jawa Tengah, dan telah beroperasi sejak tahun 2012. Mereka menggunakan teknologi canggih dan memiliki tenaga profesional yang siap melayani pelanggan. Lulu 'n Be menawarkan layanan pick-up dan delivery melalui telepon, sehingga pelanggan dapat dengan mudah mengatur antar-jemput pakaian mereka. Dengan fokus pada kualitas dan kepuasan pelanggan, Lulu 'n Be Luxury Laundry adalah pilihan yang tepat untuk kebutuhan laundry Anda",
            "jam_buka" => "7.00",
            "jam_tutup" => "17.00",
            "jenis_layanan" => $jenisLayanan,
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

        // $laundry = new Laundry();
        // $laundry->id_admin = 0;
        // $laundry->nama = "Express Laundry";
        // $laundry->alamat = "Purwokerto";
        // $laundry->nomor_telp = "085244682919";
        // $laundry->deskripsi = "Lulu 'n Be Luxury Laundry adalah layanan laundry yang berbasis di Purwokerto, Jawa Tengah, dan telah beroperasi sejak tahun 2012. Mereka menggunakan teknologi canggih dan memiliki tenaga profesional yang siap melayani pelanggan. Lulu 'n Be menawarkan layanan pick-up dan delivery melalui telepon, sehingga pelanggan dapat dengan mudah mengatur antar-jemput pakaian mereka. Dengan fokus pada kualitas dan kepuasan pelanggan, Lulu 'n Be Luxury Laundry adalah pilihan yang tepat untuk kebutuhan laundry Anda";
        // $laundry->jam_buka = "7:00:00";
        // $laundry->jam_tutup = "17:00:00";
        // $laundry->jenis_layanan = $jenisLayanan;
        // $laundry->harga = 3000;
        // $laundry->rating = 4.9;
        // $laundry->foto = '/img/laundry-img.png"';
        // $laundry->lon = 0;
        // $laundry->lan = 0;
        // $laundry->save();