<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ptkis;

class PtkisSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nama' => 'STAI Al-Hikmah Bandar Lampung',
                'akreditasi' => 'B',
                'alamat' => 'Jl. Soekarno-Hatta No.10, Bandar Lampung',
            ],
            [
                'nama' => 'STAI Tulang Bawang',
                'akreditasi' => 'B',
                'alamat' => 'Jl. Raya Menggala, Tulang Bawang, Lampung',
            ],
            [
                'nama' => "STAI Al-Ma'arif Way Kanan",
                'akreditasi' => 'C',
                'alamat' => 'Jl. Lintas Tengah Sumatera, Way Kanan, Lampung',
            ],
        ];

        foreach ($data as $item) {
            Ptkis::create($item);
        }
    }
}
