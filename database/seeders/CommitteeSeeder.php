<?php

namespace Database\Seeders;

use App\Models\Committee;
use Illuminate\Database\Seeder;

class CommitteeSeeder extends Seeder
{
    public function run(): void
    {
        $contraloria = Committee::create(['committeeName' => 'UNIDAD DE CONTRALORÍA']);
        $administrativa = Committee::create(['committeeName' => 'UNIDAD ADMINISTRATIVA']);
        $financiera = Committee::create(['committeeName' => 'UNIDAD FINANCIERA']);
        $ejecutiva = Committee::create(['committeeName' => 'UNIDAD EJECUTIVA']);

        $subcomitesEjecutiva = [
            ['committeeName' => 'COMITÉ DE SALUD', 'parentId' => $ejecutiva->id],
            ['committeeName' => 'ALIMENTACIÓN DE SERVICIOS', 'parentId' => $ejecutiva->id],
            ['committeeName' => 'MESA TÉCNICA DE AGUA', 'parentId' => $ejecutiva->id],
            ['committeeName' => 'DE DEPORTE', 'parentId' => $ejecutiva->id],
            ['committeeName' => 'DE JUVENTUD', 'parentId' => $ejecutiva->id],
            ['committeeName' => 'DE PROTECCIÓN SOCIAL', 'parentId' => $ejecutiva->id],
            ['committeeName' => 'DE EDUCACIÓN', 'parentId' => $ejecutiva->id],
            ['committeeName' => 'DE CULTURA EN REVOLUCIÓN', 'parentId' => $ejecutiva->id],
            ['committeeName' => 'DE COMUNICACIÓN E INFORMACIÓN', 'parentId' => $ejecutiva->id],
        ];

        foreach ($subcomitesEjecutiva as $sub) {
            Committee::create($sub);
        }
    }
}