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

    public function ratings(): HasMany
    {
        return $this->hasMany(Rating::class, "id_laundry", "id_laundry");
    }
    public function favorites(): HasMany
    {
        return $this->hasMany(Favorite::class, "id_laundry", "id_laundry");
    }
}
