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
            ['comunityName' => 'COMUNA SOCIALISTA FLOR MONTIEL',
            'googleMaps' => 'MUNICIPIO MARA MAPA',
            ],
        ];
        Comunity::insert($arrComunity);
    }
}
