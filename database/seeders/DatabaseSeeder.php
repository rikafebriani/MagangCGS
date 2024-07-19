<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Kelasmodel;
use Database\Factories\KelasmodelFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        
        ]);

        // KelasmodelFactory::factory(10)->create();
        // $this->call(
        //     db_user::class,
        //     KelasSeeder::class,
        // );
    }
}