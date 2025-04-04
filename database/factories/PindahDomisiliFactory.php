<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PindahDomisili>
 */
class PindahDomisiliFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tanggal' => fake()->date(),
            'alamat_asal' => fake()->address(),
            'tujuan' => fake()->address(),
            'alasan_pindah' => fake()->sentence(),
        ];
    }
}
