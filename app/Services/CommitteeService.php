<?php
namespace App\Services;
use App\Models\Committee;
use Illuminate\Support\Facades\Crypt;

class CommitteeService{
    public function store(array $committee){
        $duplicate = Committee::select('id')->where([
            ['committeeName', '=', $committee['committeeName']],
            ['googleMaps', '=', $committee['googleMaps']]
        ])->first();
        if($duplicate){
            return false;
        }else{
            return Committee::create($committee);
        }
    }

    public function findAll(){
        $findAll = Committee::select('id', 'committeeName', 'googleMaps', 'photoCommittee'
        )->get()->map(function($committeeTemp){
        $idEncrypt = Crypt::encrypt($committeeTemp->id);
        $committeeTemp->committeeId = $idEncrypt;
        unset($committeeTemp->id);
        return $committeeTemp;
        });
        return $findAll;
    }
}






?>