<?php

namespace Database\Factories;

use App\Models\Penduduk;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DomisiliPenduduk>
 */
class DomisiliPendudukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'penduduk_id'   => Penduduk::factory(),
            'tanggal'       => fake()->date(),
            'nomor_surat'   => fake()->numberBetween([1000000000, 9999999999]),
        ];
    }
}
