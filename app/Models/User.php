<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\User;
use App\Models\Rating;
use App\Models\Favorite;
use App\Models\Applicant;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        'photo',
        'password',
        'role'
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

    public static function register($request){
        // dd($register["input-username"]);
        return User::create([
            'name' => $request["input-username"],
            'email' => $request["input-email"],
            'password' => Hash::make($request["input-password"]),
            'role' => "user"
        ]);
    }
    public static function registerAdmin(){
        // dd($register["input-username"]);
        User::create([
            'name' => "admin",
            'email' => "siwalu90@gmail.com",
            'password' => Hash::make("Admin@321"),
            'role' => "admin"
        ]);
    }

    public static function getUser($email){
        $laundry = collect(User::all());

        return $laundry->firstWhere("email", $email);
    }
    public static function updates($id_user, $column, $value){
        $user = User::find($id_user);
        $user[$column] = $value;

        $user->save();
    }
    public function isAdmin(){
        return Auth::user()->role == "admin";
    }
    public function isUser(){
        return Auth::user()->role == "user";
    }
    public function isLaundry(){
        return Auth::user()->role == "laundry";
    }
    public function ratings(): HasMany
    {
        return $this->hasMany(Rating::class, "id", "id");
    }
    public function favorites(): HasMany
    {
        return $this->hasMany(Favorite::class, "id_user", "id");
    }
    public function applicants(): HasMany
    {
        return $this->hasMany(Applicant::class, "id", "id");
    }
}
