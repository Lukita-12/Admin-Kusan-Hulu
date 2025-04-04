<?php

namespace Database\Factories;

use App\Models\Penduduk;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Aktakematian>
 */
class AktakematianFactory extends Factory
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
            'tanggal' => fake()->date('Y-m-d'),
            'tanggal_meninggal' => fake()->date('Y-m-d'),
            'tempat_meninggal' => fake()->address(),
            'penyebab_meninggal' => fake()->sentence(),
        ];
    }
}