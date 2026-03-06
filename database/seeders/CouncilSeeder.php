<?php

namespace Database\Seeders;

use App\Models\Council;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CouncilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arrCouncil = [
            [
                'councilName' => 'SAN MAGALLAN',
                'comunityId' => 1,
                'googleMaps' => 'http/direccion/inventada/del/estado/zulia/Maracaibo',
                'cityId' => 1
            ],
            [
                'councilName' => 'ARBOLES DEL TORO',
                'comunityId' => 2,
                'googleMaps' => 'https/jardin/botanico',
                'cityId' => 1
            ]
        ];  
        Council::insert($arrCouncil);
    }
}
