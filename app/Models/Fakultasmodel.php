<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fakultasmodel extends Model
{
    use HasFactory;
    protected $table = 'dt_fakultas';
    protected $fillable = ['fakultas_kode','fakultas_nama','fakultas_dekan','fakultas_alamat'];
    public $incrementing = false;
    protected $primaryKey = 'fakultas_id';
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->fakultas_id = (string) Str::uuid();
        });
    }
}