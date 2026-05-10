<?php

namespace Database\Seeders;

use App\Models\Council;
use App\Models\Comunity;
use Illuminate\Database\Seeder;

class CouncilSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            '29 DE ENERO' => ['29 DE ENERO'],
            'SAN AGUSTÍN' => ['SAN AGUSTÍN', 'SAN AGUSTÍN 1', 'SAN AGUSTÍN 2', 'SAN AGUSTÍN 4', 'SAN AGUSTÍN II', 'SAN AGUSTÍN III', 'LOS HIJOS DE DIOS', 'SENDERO DE LUZ Y ESPERANZA'],
            'BENDICIÓN DE DIOS' => ['BENDICIÓN DE DIOS SECTOR ISRAEL'],
            'GERMÁN RODRÍGUEZ' => ['GERMÁN RODRÍGUEZ'],
            'FELIPE HERNÁNDEZ' => ['FELIPE HERNÁNDEZ 1', 'FELIPE HERNÁNDEZ 2'],
            'CIUDAD MARACAIBO' => ['CIUDAD MARACAIBO'],
            'LAS MERCEDES' => ['LAR MERCEDES 2', 'LAS MERCEDES SOCIALISTAS SECTOR1'],
            'LOS MEMBRILLOS' => ['LOS MEMBRILLOS'],
            'VILLA CONCEPCIÓN' => ['VILLA CONCEPCIÓN'],
            'LAS TRES S' => ['EL QUE ABRIÓ EL CAMINO'],
            'ARCOIRIS' => ['ARCO IRIS DEL LIBERTADOR'],
            '15 DE JULIO' => ['15 DE JULIO'],
            'ESTRELLA DEL VALLE' => ['ESTRELLA DEL VALLE 1', 'ESTRELLA DEL VALLE 2'],
            '14 DE JULIO' => ['14 DE JULIO'],
            'LA PIONERA' => ['LA PIONERA'],
            'JAGÜEY DE VERA' => ['JAGÜEY DE VERA 2', 'LUCHADORES DE LA PATRIA SOCIALISTA DE JAGÜEY DE VERA'],
            '7 DE ENERO' => ['7 DE ENERO'],
            'ANA MARÍA CAMPOS' => ['ANA MARIA CAMPOS'],
            'ARBOLEDA' => ['LA ARBOLEDA'],
            'EL MORICHAL' => ['BRISAS DEL MORICHAL'],
            'EL RENACER' => ['EL RENACER'],
            'LA RINCONADA' => ['LA RINCONADA 2', 'LA RINCONADA FE Y ALEGRÍA', 'LA RINCONADA FE Y ALEGRÍA BOLÍVAR EN VICTORIA'],
            'LOS RÍOS' => ['LOS RÍOS BOLIVARIANOS'],
            'ENRIQUE MÁRQUEZ' => ['ENRIQUE MÁRQUEZ'],
            'MANANTIAL DEL CUI' => ['MANANTIAL DE Cuji'],
            'ESTRELLA DE BELÉN' => ['ESTRELLA DE BELÉN', 'CORAZÓN DE MI PATRIA'],
            'JERUSALEN' => ['PORTAL DE BELÉN'],
            'EL RAYO AZUL' => ['RAYO AZUL'],
            'LA LAGUNITA' => ['LA LAGUNITA'],
            'LA MONTAÑITA' => ['TAWALAYU', 'SUCHOUNIMMA HIJOS DE LA TIERRA', 'SUCHOUNIMMA 2 HIJOS DE LA TIERRA', 'URB. LA MONTAÑITA 2'],
            'LA GRAN VICTORIA' => ['GENERALÍSIMO RAFAEL URDANETA', 'NATALICIO DEL LIBERTADOR', 'ABRIENDO CAMINOS EL AMANECER'],
            'VILLA ESPERANZA' => ['SOCIALISTA DEL SIGLO XX'],
            'EL LESLAY' => ['REVOLUCIONARIOS SOCIALISTAS', 'BOLÍVAR CHÁVEZ'],
            'DIVINA CONCEPCIÓN' => ['DIVINA CONCEPCIÓN'],
            'EL HOYITO' => ['CARMEN HERNÁNDEZ']
        ];

        $arrCouncil = [];

        foreach ($data as $comunaNombre => $consejos) {
            $comunidad = Comunity::where('comunityName', $comunaNombre)->first();
            
            if ($comunidad) {
                foreach ($consejos as $nombreConsejo) {
                    $arrCouncil[] = [
                        'councilName' => $nombreConsejo,
                        'comunityId'  => $comunidad->id,
                        'googleMaps'  => '',
                        'cityId'      => 311,
                        'created_at'  => now(),
                        'updated_at'  => now(),
                    ];
                }
            }
        }

        foreach (array_chunk($arrCouncil, 50) as $chunk) {
            Council::insert($chunk);
        }
    }
}