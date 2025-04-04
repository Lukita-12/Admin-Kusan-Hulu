<?php

namespace Database\Factories;

use App\Models\Penduduk;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PerubahanKartuKeluarga>
 */
class PerubahanKartuKeluargaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'penduduk_id' => Penduduk::factory(),
            'tanggal' => fake()->date(),
            'deskripsi_perubahan' => fake()->sentence(),
        ];
    }
}
