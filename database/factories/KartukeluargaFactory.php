<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kartukeluarga>
 */
class KartukeluargaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'no_kk' => fake()->numberBetween(100000000000, 999999999999),
            'kepala_keluarga' => fake()->name(),
            'alamat' => fake()->address(),
            'kelurahan_desa' => fake()->city(),
            'kecamatan' => fake()->city(),
            'kabupaten' => fake()->city(),
            'provinsi' => fake()->city(),
            'kode_pos' => fake()->randomNumber(5, true),
            'tanggal_penerbitan' => fake()->date('Y-m-d'),
        ];
    }
}
