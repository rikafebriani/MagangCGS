<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prodimodel extends Model
{
    use HasFactory;
    protected $table = 'dt_prodi';
    protected $primaryKey = 'prodi_id';
    protected $fillable = ['prodi_kode', 'prodi_nama', 'fakultas_kode', 'jenjang_nama', 'prodi_status','kelas_kode'];
    public $incrementing = false;
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->prodi_id = (string) Str::uuid();
        });
    }
}