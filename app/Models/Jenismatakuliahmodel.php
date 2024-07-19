<?php
namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenismatakuliahmodel extends Model
{
    use HasFactory;

    protected $table = 'dt_jenis_matakuliah';
    protected $primaryKey = 'jenis_matakuliah_id';
    protected $fillable = ['jenis_matakuliah_kode','jenis_matakuliah_nama'];
    public $incrementing = false;
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->jenis_matakuliah_id = (string) Str::uuid();
        });
    }
}