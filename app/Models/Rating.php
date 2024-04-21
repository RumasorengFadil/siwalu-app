<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        "id_laundry",
        "id_user",
        "score",
        "rating_comments",
    ];


    public static function postRatingLaundry($request){
        Rating::create([
            "id_laundry" => $request["input-laundry-id"],
            "score" => $request["score"],
            "rating_comments" => $request["reason"],
            "post_at" => date("d F Y")
        ]);

    }
}
