<?php

namespace Database\Factories;

use App\Models\Penduduk;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PenerbitanAktaKelahiran>
 */
class PenerbitanAktaKelahiranFactory extends Factory
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
            'nomor_akta' => fake()->numberBetween(1000000000, 9999999999),
            'tempat_kelahiran' => fake()->city(),
            'nama_anak' => fake()->name(),
            'jenis_kelamin' => fake()->randomElement(['Laki-laki', 'Perempuan']),
            'agama' => fake()->word(),
            'nama_ayah' => fake()->name(),
            'nama_ibu' => fake()->name(),
            'upload_sp_bidan' => 'https://picsum.photos/400/400',
            'upload_sp_rt' => 'https://picsum.photos/400/400',
        ];
    }
}
