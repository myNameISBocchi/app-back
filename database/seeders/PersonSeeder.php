<?php

namespace Database\Seeders;

use App\Models\Person;
use App\Models\PersonRole;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arrPerson = [
            [
                'firstName' => 'Alfonso',
                'lastName' => 'Espina',
                'email' => 'espinaalfonso123@gmail.com',
                'phone' => '0414-651-0323',
                'identification' => '31474890',
                'status' => 1,
                'date' => '05-10-05',
                'password' => 'jesus',
                'cityId' => 1,
                'roles' => [
                    'ADMINISTRADOR'
                ]
            ]
        ];
        foreach($arrPerson as $key => $data){
            $rolesNames = $data['roles'];
            unset($data['roles']);
            $person = Person::create($data);
            foreach($rolesNames as $key => $roleName){
                $roles = Role::where('roleName', $roleName)->first();
                if($roles){
                    PersonRole::create(
                        [
                            'personId' => $person->id,
                            'roleId' => $roles->id
                        ]
                    );

                }

            }


        }
    
    }
}
