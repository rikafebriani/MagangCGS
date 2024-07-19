<?php

namespace App\Imports;

use App\Models\Kelasmodel;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KelasImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    protected $successCount = 0;
    protected $failureCount = 0;

    public function model(array $row)
    {
        try {
            DB::beginTransaction();
            
            $kelas = new Kelasmodel([
            'kelas_kode' => $row['kelas_kode'],            
            'kelas_nama' => $row['kelas_nama'],
            'kelas_keterangan' => $row['kelas_keterangan'],
            'kelas_kapasitas' => $row['kelas_kapasitas'],
        
        ]);

        $kelas->save();

            DB::commit();

            $this->successCount++;
        } catch (\Exception $e) {
            
            DB::rollBack();

            // Catat kegagalan
            $this->failureCount++;
        }

        return null; // Tidak mengembalikan model karena tidak ada yang dikembalikan ke dalam database
    }

    public function getSuccessCount()
    {
        return $this->successCount;
    }

    public function getFailureCount()
    {
        return $this->failureCount;
    }
}