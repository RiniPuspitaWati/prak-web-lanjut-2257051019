<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fakultas; // Make sure to import the Fakultas model

class FakultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'FAKULTAS MIPA',
        ];

        foreach ($data as $fakultas) {
            Fakultas::create([
                'nama_fakultas' => $fakultas, // Make sure the column name matches your 'fakultas' table's column
            ]);
        }
    }
}
