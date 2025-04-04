<?php

namespace Database\Factories;

use App\Models\Desa;
use App\Models\Kartukeluarga;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Penduduk>
 */
class PendudukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'desa_id' => Desa::factory(),
            'kartukeluarga_id'=> Kartukeluarga::factory(),
            'nama' => fake()->name(),
            'jenis_kelamin' => fake()->randomElement(['Laki-laki', 'Perempuan']),
            'status_perkawinan' => fake()->randomElement(['Belum kawin', 'Kawin belum tercatat', 'Kawin tercatat', 'Cerai hidup', 'Cerai mati']),
            'tempat_lahir' => fake()->city(),
            'tanggal_lahir' => fake()->date('Y-m-d'),
            'agama' => fake()->sentence(),
            'pendidikan_terakhir' => fake()->sentence(),
            'pekerjaan' => fake()->company(),
            'alamat_lengkap' => fake()->address(),
            'kedudukan_dalam_keluarga' => fake()->sentence(),
            'warga_negara' => fake()->country(),
        ];
    }
}
