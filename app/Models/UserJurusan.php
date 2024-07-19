<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Foundation\Auth\UserJurusan as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class UserJurusan extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    // protected $table = 'dt_user_jurusan';
    protected $table = 'dt_user_jurusan';
    protected $primaryKey = 'user_jurusan_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_jurusan_id',
        'user_name',
        'user_nama',
        'user_email',
        'password',
        'jurusan_kode',
        'user_status',
        'user_foto',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];
}