<?php

namespace Database\Seeders;

use App\Models\pembayaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        pembayaran::factory()->create([
            'nama' => 'Dana',
            'nomor' => '08129232023',
            'an' => 'Faiz Aflah Hafizuddin',
            'jenis' => 'E-Wallet',
        ]);
        pembayaran::factory()->create([
            'nama' => 'Mandiri',
            'nomor' => '1232245612933921',
            'an' => 'Faiz Aflah Hafizuddin',
            'jenis' => 'Bank',
        ]);
    }
}
