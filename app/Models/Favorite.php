<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        "id_user",
        "id_laundry",
        "confirmed",
    ];

    public static function getFavorites(){
        return Favorite::where('confirmed', true)->get();
    }

    public static function storeFavorite($request){
        //dd($request->all());
        $id_laundry = $request->input("input-laundry-id");
        $id_user = $request->input("id_user");
        $favorite = Favorite::where('id_user', $id_user)
                            ->where('id_laundry', $id_laundry)
                            ->first();
        

        if($favorite !== null) {
            //dd($favorite->confirmed);
            if($favorite->confirmed) {
                $favorite->confirmed = !$favorite->confirmed;
                $favorite->save();
            } else {
                $favorite->confirmed = true;
                $favorite->save();
            }
        } else {
            Favorite::create([
                "id_user" => $id_user,
                "id_laundry" => $id_laundry,
                "confirmed" => true
            ]);
        }
    } 
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, "id", "id");
    }

    public function laundry(): BelongsTo
    {
        return $this->belongsTo(Laundry::class, "id_laundry", "id_laundry");
    }
}

