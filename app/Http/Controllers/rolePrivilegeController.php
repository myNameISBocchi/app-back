<?php

namespace App\Http\Controllers;

use App\Services\RolePrivilegeService;
use Illuminate\Http\Request;

class rolePrivilegeController extends Controller
{
    public function __construct(protected RolePrivilegeService $rolePrivileges){}
    public function findPrivilegeByRoleId(string $roleId){
        try{
            $error = 0;
            $msg = "Registro encontrado";
            $results = $this->rolePrivileges->findPrivilegeByRoleId($roleId);
            if($results){
                $res = [
                'error' => $error,
                'msg' => $msg,
                'results' => $results
                ];
                return response()->json($res,200);
            }
        }catch(\Exception $e){
            return response()->json(['error' => 500, 'msg' => 'Error del servidor']);

        }
    }
    public function store(Request $req){
        try{
            $error = 0;
            $msg = 'save';
            $create = $this->rolePrivileges->store($req->input());
            if($create){
                $res = [
                    'error' => $error,
                    'msg' => $msg,
                ];
                return response()->json($res,200);
            }
        }catch(\Exception $e){
            dd($e);
            return response()->json(['error' => 500, 'msg' => 'Error del servidor']);

        }

    }
}
