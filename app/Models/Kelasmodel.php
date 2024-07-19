<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelasmodel extends Model
{
    use HasFactory;
    protected $table = 'dt_kelas';
    protected $fillable = ['kelas_kode', 'kelas_nama', 'kelas_keterangan', 'kelas_kapasitas'];
    public $incrementing = false;
    protected $primaryKey = 'kelas_id';
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->kelas_id = (string) Str::uuid();
        });
    }
}
