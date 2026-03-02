<?php
namespace App\Services;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Support\Facades\Crypt;
class UserService{
    public function store(array $user){
        $arrRoles = json_decode($user['roleId']);
        $duplicate = User::select('id')->where([
            ['identification',$user['identification']],
            ['phone',$user['phone']],
            ['email',$user['email']],
        ])->first();
        if($duplicate){
            return false;
        }else{
            $user['cityId'] = Crypt::decrypt($user['cityId']);
            $user =  User::create($user);

            UserRole::where('userId',$user->id)->delete();
            $insert = [];
            for($i = 0; $i < count($arrRoles); $i++){
                $idRoleDecrypted = Crypt::decrypt($arrRoles[$i]);
                $insert[] =[
                'userId' => $user->id,
                'roleId' => $idRoleDecrypted
                ];
            }
            UserRole::insert($insert);
            return true;
        }
    }

    public function findAll(){
        $result = User::select('users.id as userId',
        'firstName',
        'lastName',
        'email',
        'identification',
        'phone',
        'cityId',
        'cities.cityName as city',
        'countries.countryName as country',
        'states.stateName as state',
        'status'
        )->join(
            'cities', 'users.cityId', '=', 'cities.id'
        )->join(
            'states', 'cities.stateId', '=', 'states.id'  
        )->join(  
            'countries', 'states.countryId', '=', 'countries.id' 
        )->get()->map(function($item){
            $userIdEncrypt = Crypt::encrypt($item->userId);
            unset($item->userId);
            $item->userId = $userIdEncrypt;
            $item->locality = [
                'city' => $item->city,
                'country' => $item->country,
                'state' => $item->state
            ];
            return $item;
        })->toArray();
        return $result;

    }

    public function update(string $id, array $user){

    }

    public function delete(string $id){

    }

    public function findById(string $id){

    }
}

?>