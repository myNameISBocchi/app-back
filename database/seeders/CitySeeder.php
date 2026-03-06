<?php

namespace Database\Seeders;

use App\Models\Citie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arrCity = [
            [
            'cityName' => 'MARACAIBO',
            'stateId' => 1
            ]
        ];
        Citie::insert($arrCity);
    }
}
