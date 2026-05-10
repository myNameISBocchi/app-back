<?php

namespace Database\Seeders;

use App\Models\Comunity;
use Illuminate\Database\Seeder;

class ComunitieSeeder extends Seeder
{
    public function run(): void
    {
        $comunidades = [
            '29 DE ENERO', 'SAN AGUSTÍN', 'BENDICIÓN DE DIOS', 'GERMÁN RODRÍGUEZ',
            'FELIPE HERNÁNDEZ', 'LA MONTAÑITA', 'CIUDAD MARACAIBO', 'DIVINA CONCEPCIÓN',
            'LOS MEMBRILLOS', 'LAS MERCEDES', 'VILLA CONCEPCIÓN', 'LA GRAN VICTORIA',
            'LAS TRES S', 'ARCOIRIS', '15 DE JULIO', 'EL HOYITO', 'VILLA ESPERANZA',
            'ESTRELLA DEL VALLE', '14 DE JULIO', 'LA PIONERA', 'JAGÜEY DE VERA',
            '7 DE ENERO', 'ANA MARÍA CAMPOS', 'ARBOLEDA', 'EL MORICHAL', 'EL RENACER',
            'LA RINCONADA', 'LOS RÍOS', 'ENRIQUE MÁRQUEZ', 'EL LESLAY', 
            'MANANTIAL DEL CUI', 'ESTRELLA DE BELÉN', 'JERUSALEN', 'EL RAYO AZUL', 
            'LA LAGUNITA'
        ];

        foreach ($comunidades as $nombre) {
            Comunity::create([
                'comunityName' => $nombre,
                'googleMaps' => '',
            ]);
        }
    }
}