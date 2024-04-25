<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Rating;
use Illuminate\Contracts\Auth\MustVerifyEmail;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        "photo",
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public static function register($register){
        // dd($register["input-username"]);
        User::create([
            "name" => $register["input-username"],
            "email" => $register["input-email"],
            "photo" => "ari-wijaya.png",
            "password" => $register["input-password"]
        ]);
    }

    public static function getUser($email){
        $laundry = collect(User::all());

        return $laundry->firstWhere("email", $email);
    }

    public function ratings(): HasMany
    {
        return $this->hasMany(Rating::class, "id", "id");
    }
}
