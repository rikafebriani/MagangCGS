<?php

namespace Database\Factories;

use App\Models\Kelasmodel;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class KelasmodelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Kelasmodel::class;

    public function definition(): array
    {
        return [
            'kelas_kode' => $this->faker->unique()->regexify('[A-Za-z0-9]{10}'),
            'kelas_nama' => $this->faker->unique()->word,
            'kelas_keterangan' => $this->faker->sentence,
            'kelas_kapasitas' => $this->faker->numberBetween(10, 50),
        ];
    }
}
