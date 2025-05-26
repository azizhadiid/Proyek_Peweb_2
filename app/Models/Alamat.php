<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Alamat extends Model
{
    use HasFactory;

    protected $table = 'alamat';

    protected $fillable = [
        'user_id',
        'alamat'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
