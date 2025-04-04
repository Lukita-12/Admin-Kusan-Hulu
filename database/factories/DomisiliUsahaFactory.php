<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DomisiliUsaha>
 */
class DomisiliUsahaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tanggal'       => fake()->date(),
            'nama_usaha'    => fake()->company(),
            'jenis_usaha'   => fake()->jobTitle(),
            'alamat_usaha'  => fake()->address(),
        ];
    }
}
