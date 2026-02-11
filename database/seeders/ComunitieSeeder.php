<?php

namespace Database\Seeders;

use App\Models\Comunity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComunitieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arrComunity = [
            ['comunityName' => 'CACHIRI',
            'googleMaps' => 'MUNICIPIO MARA MAPA',
            'photoComunity' => 'MONTE'
            ],
            [
            'comunityName' => 'CUATRO BOCAS',
            'googleMaps' => '3 BOCAS MAPA',
            'photoComunity' => 'MONTE'
            ],
        ];
        Comunity::insert($arrComunity);
    }
}
