<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jenisjabatanmodel extends Model
{
    use HasFactory;

    protected $table = 'dt_jenis_jabatan';
    protected $primaryKey = 'jenis_jabatan_id';
    protected $fillable = ['jenis_jabatan_kode','jenis_jabatan_nama'];
    public $incrementing = false;
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->jenis_jabatan_id = (string) Str::uuid();
        });
    }
}
