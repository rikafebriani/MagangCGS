<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KelasheadingExport implements FromArray, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $headings = [
        'kelas_kode',
        'kelas_nama',
        'kelas_keterangan',
        'kelas_kapasitas',
    
    ];

    public function array(): array
    {
        // Mengembalikan array kosong karena kita hanya ingin menampilkan heading tanpa data
        return [];
    }

    public function headings(): array
    {
        return $this->headings;
    }
}