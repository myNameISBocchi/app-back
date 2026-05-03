<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Country;
use App\Models\State;

class LocationSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {
     
            $pathCountries = database_path('seeders/imports/paises.txt');
            if (file_exists($pathCountries)) {
                $countries = explode(';', file_get_contents($pathCountries));
                foreach ($countries as $row) {
                    if (empty(trim($row))) continue;
                    $data = explode(',', $row);
                    DB::table('countries')->updateOrInsert(
                        ['countryName' => strtoupper(trim($data[1]))]
                    );
                }
            }

            $venezuela = Country::where('countryName', 'VENEZUELA')->first();

       
            $pathStates = database_path('seeders/imports/estadosVenezuela.txt');
            if (file_exists($pathStates)) {
                $states = explode(';', file_get_contents($pathStates));
                foreach ($states as $row) {
                    if (empty(trim($row))) continue;
                    $data = explode(',', $row);
                    DB::table('states')->updateOrInsert(
                        ['stateName' => strtoupper(trim($data[0]))],
                        ['countryId' => $venezuela->id, 'initials' => strtoupper(trim($data[1]))]
                    );
                }
            }

  
            $pathCities = database_path('seeders/imports/municipiosVenezuela.txt');
            if (file_exists($pathCities)) {
                $cities = explode(';', file_get_contents($pathCities));
                foreach ($cities as $row) {
                    if (empty(trim($row))) continue;
                    $data = explode(',', $row);
                    
                  
                    $state = State::where('initials', strtoupper(trim($data[2])))->first();
                    
                    if ($state) {
                        DB::table('cities')->insert([
                            'stateId'  => $state->id,
                            'cityName' => strtoupper(trim($data[1])),
                        ]);
                    }
                }
            }
        });
    }
}