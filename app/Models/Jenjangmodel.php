<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jenjangmodel extends Model
{
    use HasFactory;
    protected $table = 'dt_jenjang';
    protected $primaryKey = 'jenjang_id';
    protected $fillable = ['jenjang_nama'];
    public $incrementing = false;
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->jenjang_id = (string) Str::uuid();
        });
    }

}