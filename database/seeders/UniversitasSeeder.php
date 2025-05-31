<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Universitas;

class UniversitasSeeder extends Seeder
{
    public function run(): void
    {
      
        Universitas::create(['nama' => 'Universitas Islam Lampung']);
       
    }
}
