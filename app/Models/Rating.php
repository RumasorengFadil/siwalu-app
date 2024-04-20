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
        "post_at"
    ];
}
