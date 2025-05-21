<?php

namespace Database\Factories;

use App\Models\Kartukeluarga;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PengajuanPerubahanKK>
 */
class PengajuanPerubahanKKFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kartukeluarga_id'          => Kartukeluarga::factory(),
            // Kartu keluarga
            'no_kk'                     => fake()->numberBetween(100000000000, 999999999999),
            'kepala_keluarga'           => fake()->name(),
            'alamat'                    => fake()->address(),
            'kelurahan_desa'            => fake()->city(),
            'kecamatan'                 => fake()->city(),
            'kabupaten'                 => fake()->city(),
            'provinsi'                  => fake()->city(),
            'kode_pos'                  => fake()->randomNumber(5, true),
            'tanggal_penerbitan'        => fake()->date('Y-m-d'),
            // Penduduk
            'nama'                      => fake()->name(),
            'jenis_kelamin'             => fake()->randomElement(['Laki-laki', 'Perempuan']),
            'status_perkawinan'         => fake()->randomElement(['Belum kawin', 'Kawin belum tercatat', 'Kawin tercatat', 'Cerai hidup', 'Cerai mati']),
            'tempat_lahir'              => fake()->city(),
            'tanggal_lahir'             => fake()->date('Y-m-d'),
            'agama'                     => fake()->sentence(),
            'pendidikan_terakhir'       => fake()->sentence(),
            'pekerjaan'                 => fake()->company(),
            'alamat_lengkap'            => fake()->address(),
            'kedudukan_dalam_keluarga'  => fake()->sentence(),
            'warga_negara'              => fake()->country(),
        ];
    }
}
