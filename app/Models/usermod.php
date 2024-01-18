<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class usermod extends Model
{
    use HasFactory;
    protected $table = 'user';
    protected $primarykey = 'id_user';
    public $timestamps = false;
    public $fillable = [
        'nama_pelanggan',
        'tanggal_lahir',
        'gender',
        'alamat',
        'username',
        'password',
        'level'
    ];
}