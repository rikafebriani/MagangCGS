<?php

namespace Database\Seeders;

use App\Models\Kelasmodel;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kelasmodel::factory()->count(50)->create();
    }
}
