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
    protected $primaryKey = 'id_laundry';

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
    protected $primaryKey = 'id_laundry';
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

    public static function updateLaundry($request)
    {
        $id = $request->input('input-laundry-id');
        $laundry = self::where('id_laundry', $id)
        ->first();

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

    public static function deleteLaundry($id)
    {
        $laundry = self::where('id_laundry', $id)->first();
        if ($laundry) {
            $laundry->delete();
            return true;
        }
        return false;
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
