<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Laundry;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        "id_laundry",
        "id_user",
        "score",
        "rating_comments",
    ];


    public static function postRatingLaundry($request)
    {
        // $usedId = $request->session()->all()["user"]->id;
        // dd($request);


        Rating::create([
            "id_laundry" => $request["input-laundry-id"],
            "id_user" => $request["input-user-id"],
            "score" => $request["score"],
            "rating_comments" => $request["reason"],
            "post_at" => date("d F Y")
        ]);

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
