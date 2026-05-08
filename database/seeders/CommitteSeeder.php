<?php

namespace Database\Seeders;

use App\Models\Committee;
use Illuminate\Database\Seeder;

class CommitteSeeder extends Seeder
{
    public function run(): void
    {
        $contraloria = Committee::create(['committeeName' => 'CONTRALORÍA']);
        $administrativa = Committee::create(['committeeName' => 'ADMINISTRATIVA']);
        $ejecutiva = Committee::create(['committeeName' => 'EJECUTIVA']);

        $subcomitesEjecutiva = [
            ['committeeName' => 'FUEGO', 'parentId' => $ejecutiva->id],
            ['committeeName' => 'HIELO', 'parentId' => $ejecutiva->id],
            ['committeeName' => 'TIERRA', 'parentId' => $ejecutiva->id],
            ['committeeName' => 'AIRE', 'parentId' => $ejecutiva->id],
        ];

        foreach ($subcomitesEjecutiva as $sub) {
            Committee::create($sub);
        }
    }
}