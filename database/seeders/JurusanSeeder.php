<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jurusan;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'S1 - Ilmu Komputer',
            'S1 - Sistem Informasi',
            'D3 - Manajemen Informatika',
        ];

        foreach ($data as $jurusan) {
            Jurusan::create([
                'nama_jurusan' => $jurusan,
            ]);
        }
    }
}