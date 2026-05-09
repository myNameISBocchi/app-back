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
    return Council::join('comunities', 'councils.comunityId', '=', 'comunities.id')
        ->select(
            'councils.id as real_id',
            'councils.councilName',
            'comunities.comunityName',
            'councils.googleMaps',
            'councils.comunityId'
        )
        ->get()
        ->map(function($item){

            $item->councilId = Crypt::encrypt($item->real_id);
            $item->comunityId = Crypt::encrypt($item->comunityId);
        
            unset($item->real_id);
            unset($item->id); 
            
            return $item;
        });
}
    
   public function update(string $id, array $data){
        $idDecrypted = Crypt::decrypt($id);
        $toUpdate = [
            'councilName' => $data['councilName'],
            'googleMaps'  => $data['googleMaps'] ?? null,
        ];
        if (!empty($data['cityId']) && $data['cityId'] !== 'undefined') {
            $toUpdate['cityId'] = Crypt::decrypt($data['cityId']);
        }
        if (!empty($data['comunityId']) && $data['comunityId'] !== 'undefined') {
            $toUpdate['comunityId'] = Crypt::decrypt($data['comunityId']);
        }
        return Council::where('id', $idDecrypted)->update($toUpdate);
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