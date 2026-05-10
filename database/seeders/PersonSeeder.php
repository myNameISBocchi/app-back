<?php

namespace Database\Seeders;

use App\Models\Committee;
use App\Models\Comunity;
use App\Models\Council;
use App\Models\Person;
use App\Models\PersonCommittees;
use App\Models\PersonComunity;
use App\Models\PersonCouncil;
use App\Models\PersonRole;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PersonSeeder extends Seeder
{
    public function run(): void
    {
        $arrPerson = [
            [
                'firstName' => 'ALFONSO',
                'lastName' => 'ESPINA',
                'email' => 'espinaalfonso123@gmail.com',
                'phone' => '0414-651-0323',
                'identification' => '31478490',
                'status' => 1,
                'date' => '2005-10-05',
                'password' => 'v31478490',
                'cityId' => 311,
                'roles' => ['ADMINISTRADOR'],
                'comunity' => 'MANANTIAL DEL CUI',
                'committe' => 'UNIDAD ADMINISTRATIVA',
                'council' => 'MANANTIAL DE CUJI'
            ],
            [
                'firstName' => 'ABUBEIKER',
                'lastName' => 'OLIVARES',
                'email' => 'Abubeikeo@gmail.com',
                'phone' => '0412-456-7890',
                'identification' => '31671119',
                'status' => 1,
                'date' => '2005-10-05',
                'password' => 'v31671119',
                'cityId' => 311,
                'roles' => ['ADMINISTRADOR'],
                'comunity' => 'ESTRELLA DE BELÉN',
                'committe' => 'UNIDAD ADMINISTRATIVA',
                'council' => 'CORAZÓN DE MI PATRIA'
            ],
            [
                'firstName' => 'CESAR',
                'lastName' => 'FUENMAYOR',
                'email' => 'cesaralexff2019@gmail.com',
                'phone' => '0414-567-8901',
                'identification' => '31225769',
                'status' => 1,
                'date' => '2005-10-05',
                'password' => 'v31225769',
                'cityId' => 311,
                'roles' => ['ADMINISTRADOR'],
                'comunity' => 'ESTRELLA DE BELÉN',
                'committe' => 'UNIDAD ADMINISTRATIVA',
                'council' => 'ESTRELLA DE BELÉN'
            ]
        ];
        
        foreach($arrPerson as $data){
            $comunityName = $data['comunity'];
            $committeName = $data['committe'];
            $councilName = $data['council'];
            $rolesNames = $data['roles'];

            unset($data['roles'], $data['comunity'], $data['council'], $data['committe']);

            $person = Person::create($data);
            
            foreach($rolesNames as $roleName){
                $role = Role::where('roleName', $roleName)->first();
                if($role){
                    PersonRole::create([
                        'personId' => $person->id,
                        'roleId' => $role->id
                    ]);
                }
            }
            
            $findComunity = Comunity::where('comunityName', $comunityName)->first();
            if($findComunity){
                PersonComunity::create([
                    'personId' => $person->id,
                    'comunityId' => $findComunity->id
                ]);
            }
            
            $findCouncil = Council::where('councilName', $councilName)->first();
            if($findCouncil){
                PersonCouncil::create([
                    'personId' => $person->id,
                    'councilId' => $findCouncil->id
                ]);
            }
            
            $findCommitte = Committee::where('committeeName', $committeName)->first();
            if($findCommitte){
                PersonCommittees::create([
                    'personId' => $person->id,
                    'committeeId' => $findCommitte->id
                ]);
            }
        }
    }
}