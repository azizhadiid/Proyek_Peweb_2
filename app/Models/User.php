<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, CanResetPassword;

    protected $table = "users";
    protected $fillable = [
        'nama',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function barangs()
    {
        return $this->hasMany(Barang::class);
    }

    public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }
    public function alamats()
    {
        return $this->hasMany(Alamat::class);
    }
    public function likedBarangs()
    {
        return $this->belongsToMany(Barang::class, 'likes')->withTimestamps();
    }
    public function cart()
    {
        return $this->hasOne(Cart::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
