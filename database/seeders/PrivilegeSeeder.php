<?php

namespace Database\Seeders;

use App\Models\Privilege;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrivilegeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arrPrivilege = [
            [

                'privilegeName' => 'USERS / LIDER DE COMUNA / VOCEROS',
                'route' => 'users',
                'status' => 1

            ],

            [

                'privilegeName' => 'COMUNIDADES',
                'route' => 'comunities',
                'status' => 1

            ],

            [
                'privilegeName' => 'CONSEJOS COMUNALES',
                'route' => 'councils',
                'status' => 1
            ],

            [
                'privilegeName' => 'COMITÊS',
                'route' => 'committees',
                'status' => 1
            ],

            [
                'privilegeName' => 'CREAR ROLES',
                'route' => 'roles',
                'status' => 1
            ],

            [
                'privilegeName' => 'PAISES',
                'route' => 'countries',
                'status' => 1
            ],

            [
                'privilegeName' => 'ESTADOS',
                'route' => 'states',
                'status' => 1
            ],

            [
                'privilegeName' => 'CIUDADES',
                'route' => 'cities',
                'status' => 1
            ]
        ];
        Privilege::insert($arrPrivilege);
    }
}
