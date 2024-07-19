<?php

namespace App\Exports;

use App\Models\Kelasmodel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KelasExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Kelasmodel::all();
        return Kelasmodel::select('kelas_kode', 'kelas_nama', 'kelas_keterangan', 'kelas_kapasitas')->get();
    }

    public function headings(): array
    {
        return [
            'Kode Kelas',
            'Nama Kelas',
            'Keterangan Kelas',
            'Kapasitas Kelas',
        ];
    }
}