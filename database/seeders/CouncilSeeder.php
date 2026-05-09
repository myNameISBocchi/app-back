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
        $councils = [
            "MANANTIAL DE CUJI", "CORAZÓN DE MI PATRIA", "ESTRELLA DE BELÉN", 
            "REVOLUCIONARIOS SOCIALISTAS", "BOLÍVAR CHÁVEZ", "RAYO AZUL", 
            "LA RINCONADA 2", "ENRIQUE MÁRQUEZ", "LA RINCONADA FE Y ALEGRÍA", 
            "LOS RÍOS BOLIVARIANOS", "LA RINCONADA FE Y ALEGRÍA BOLÍVAR EN VICTORIA", 
            "BRISAS DEL MORICHAL", "EL RENACER", "ANA MARIA CAMPOS", "7 DE ENERO", 
            "14 DE JULIO", "JAGÜEY DE VERA 2", "LA PIONERA", 
            "LUCHADORES DE LA PATRIA SOCIALISTA DE JAGÜEY DE VERA", 
            "GENERALÍSIMO RAFAEL URDANETA", "CIUDAD MARACAIBO", "URB. LA MONTAÑITA 2", 
            "PORTAL DE BELÉN", "ABRIENDO CAMINOS EL AMANECER", "SOCIALISTA DEL SIGLO XX", 
            "NATALICIO DEL LIBERTADOR", "ESTRELLA DEL VALLE 2", "ESTRELLA DEL VALLE 1", 
            "LA ARBOLEDA", "LOS HIJOS DE DIOS", "SENDERO DE LUZ Y ESPERANZA", 
            "EL QUE ABRIÓ EL CAMINO", "ARCO IRIS DEL LIBERTADOR", "SUCHOUNIMMA HIJOS DE LA TIERRA", 
            "SUCHOUNIMMA 2 HIJOS DE LA TIERRA", "FELIPE HERNÁNDEZ 2", "FELIPE HERNÁNDEZ 1", 
            "GERMÁN RODRÍGUEZ", "29 DE ENERO", "SAN AGUSTÍN 1", "SAN AGUSTÍN 2", 
            "SAN AGUSTÍN", "SAN AGUSTÍN 4", "BENDICIÓN DE DIOS SECTOR ISRAEL", 
            "SAN AGUSTÍN II", "SAN AGUSTÍN III", "CARMEN HERNÁNDEZ", "TAWALAYU", 
            "15 DE JULIO", "DIVINA CONCEPCIÓN", "VILLA CONCEPCIÓN", "LOS MEMBRILLOS", 
            "LAR MERCEDES 2", "LAS MERCEDES SOCIALISTAS SECTOR1"
        ];

        $arrCouncil = [];

        foreach ($councils as $name) {
            $arrCouncil[] = [
                'councilName' => $name,
                'comunityId'  => 1,
                'googleMaps'  => '',
                'cityId'      => 311,
                'created_at'  => now(),
                'updated_at'  => now(),
            ];
        }
        foreach (array_chunk($arrCouncil, 100) as $chunk) {
            Council::insert($chunk);
        }
    }
}