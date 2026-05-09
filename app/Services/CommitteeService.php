<?php
namespace App\Services;
use App\Models\Committee;
use COM;
use Illuminate\Support\Facades\Crypt;

class CommitteeService{
    public function store(array $committee){
        if(isset($committee['parentId']) && $committee['parentId'] !== null){
            $committee['parentId'] = Crypt::decrypt($committee['parentId']);
        }
        $duplicate = Committee::select('id')->where(
            'committeeName', '=', $committee['committeeName'],
        )->where('parentId', $committee['parentId'] ?? null)->first();
        if($duplicate){
            return false;
        }else{
            return Committee::create($committee);
        }
    }

    public function findAll(){
        $findAll = Committee::select('id', 'committeeName', 'parentId'
        )->get()->map(function($committeeTemp){
        $idEncrypt = Crypt::encrypt($committeeTemp->id);
        $committeeTemp->committeeId = $idEncrypt;
        $committeeTemp->committeeId = Crypt::encrypt($committeeTemp->id);
        if($committeeTemp->parentId){
            $committeeTemp->parentIdEncrypted = Crypt::encrypt($committeeTemp->parentId);
        }
        unset($committeeTemp->id);
        return $committeeTemp;
        });
        return $findAll;
    }

    public function update(string $id, array $committee) {
    $idDecrypted = Crypt::decrypt($id);
    if (isset($committee['parentId']) && $committee['parentId'] !== null) {
        $committee['parentId'] = Crypt::decrypt($committee['parentId']);
    }
    $duplicado = Committee::where('id', '!=', $idDecrypted)
        ->where('committeeName', $committee['committeeName'])
        ->where('parentId', $committee['parentId'] ?? null)
        ->first();
    if ($duplicado) {
        return false;
    }
    return Committee::where('id', $idDecrypted)->update($committee);
}

    public function delete(string $id){
        $idDecrypted = Crypt::decrypt($id);
         Committee::where('id', '=', $idDecrypted)->delete();
         return true;
    }
}






?>