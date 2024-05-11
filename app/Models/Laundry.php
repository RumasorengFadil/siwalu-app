<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Rating;  
use App\Models\Favorite;  


class Laundry extends Model
{

    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'id_admin',
        'id_mitra',
        'nama',
        'alamat',
        "nomor_telp",
        "deskripsi",
        "jam_buka",
        "jam_tutup",
        "jenis_layanan",
        "jenis_cucian",
        "harga",
        "rating",
        "foto",
        "lon",
        "lan"
    ];
    protected $casts = [
        'jenis_layanan' => 'array',
        'jenis_cucian' => 'array',
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
    
    static public function postLaundry($request){

        Laundry::create([
            "id_admin" => $request["id-admin"],
            "id_mitra" => $request["id-mitra"],
            "nama" => $request["name"],
            "alamat" => $request["location"],
            "nomor_telp" => $request["whatsappNumber"],
            "deskripsi" => $request["description"],
            "jam_buka" => "10.00",
            "jam_tutup" => "18.00",
            "jenis_layanan" => $request["service"],
            "jenis_cucian" => [$request["pakaian"]??null, $request["sepatu"]??null],
            "harga" => $request["harga"],
            "rating" => 4.5,
            "foto" => $request["filename"],
            "lon" => 0,
            "lan" => 0
        ]);
    }

    public function getFavorite(){
        
    }
    public function ratings(): HasMany
    {
        return $this->hasMany(Rating::class, "id_laundry", "id_laundry");
    }
    public function favorites(): HasMany
    {
        return $this->hasMany(Favorite::class, "id_laundry", "id_laundry");
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

// Laundry::create([
//     "id_admin" => $request["id_admin"],
//     "id_mitra" => $request["id_mitra"],
//     "nama" => $request["name"],
//     "alamat" => $request["location"],
//     "nomor_telp" => "085244682919",
//     "deskripsi" => "Aquos Laundry layanan laundry yang berbasis di Purwokerto, Jawa Tengah, dan telah beroperasi sejak tahun 2012. Mereka menggunakan teknologi canggih dan memiliki tenaga profesional yang siap melayani pelanggan. Lulu 'n Be menawarkan layanan pick-up dan delivery melalui telepon, sehingga pelanggan dapat dengan mudah mengatur antar-jemput pakaian mereka. Dengan fokus pada kualitas dan kepuasan pelanggan, Lulu 'n Be Luxury Laundry adalah pilihan yang tepat untuk kebutuhan laundry Anda",
//     "jam_buka" => "10.00",
//     "jam_tutup" => "18.00",
//     "jenis_layanan" => ["Express","Regular", "Super"],
//     "jenis_cucian" => ["Pakaian", "Sepatu"],
//     "harga" => 4500,
//     "rating" => 4.5,
//     "foto" => "/img/aquos-laundry-img.png",
//     "lon" => 0,
//     "lan" => 0
// ]);
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