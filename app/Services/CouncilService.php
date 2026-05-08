<?php

namespace App\Services; 
use App\models\Council;
use Illuminate\Support\Facades\Crypt;

class CouncilService{
    public function store(array $council){
        $findCounilName = Council::select('id')->where('councilName', '=', $council['councilName'])->first();
            if($findCounilName){
                return false;
            }else{
                $council['comunityId'] = Crypt::decrypt($council['comunityId']);
                $council['cityId'] = Crypt::decrypt($council['cityId']);
                return Council::create($council);
            }
    }
    public function findAll(){
        $councilAll = Council::select('councils.id as councilId',
        'councilName',
        'comunityName',
        'comunityId', 
        'councils.googleMaps',
        'comunities.id as comunityId'
        )->join('comunities', 'councils.comunityId', '=', 'comunities.id')->get()->map(function($councilTemp){
            $idEncrypt = Crypt::encrypt($councilTemp->councilId);
            $comunityIdCrypt = Crypt::encrypt($councilTemp->comunityId);
            unset($councilTemp->comunityId);
            $councilTemp->comunityId = $comunityIdCrypt;
            $councilTemp->councilId = $idEncrypt;
            unset($councilTemp->councilId);
            return $councilTemp;
        });
        return $councilAll;
    }
    
    public function update(string $id, array $council){
         $idDecrypted = Crypt::decrypt($id);
        $find = Council::select('id')->where([
            ['id', '!=', $idDecrypted],
            ['councilName', '=', $council['councilName']]
            ])->first();
        if($find){
            return false;
        }else{
            return Council::where('id', '=' , $idDecrypted)->update($council);
        }

    }
    public function delete(string $id){
        $idDecrypted = Crypt::decrypt($id);
        return Council::where('id', '=', $idDecrypted)->delete($idDecrypted);
    }

    public function findByComunity(string $comunityId){
        $idDecrypted = Crypt::decrypt($comunityId);

        return Council::select('id', 'councilName'
        )->where('comunityId', $idDecrypted)->get()->map(function($councilTemp){
            return [
                'councilId' => Crypt::encrypt($councilTemp->id),
                'councilName' => $councilTemp->councilName
            ];

        });

    }

}




?>