<?php

namespace App\Http\Controllers;

use App\Services\PrivilegeService;
use Illuminate\Http\Request;

class privilegesController extends Controller
{
    public function __construct(protected PrivilegeService $privilegeService){}
    public function store(Request $req){
        try{
        $error = 0;
        $msg = 'save';
        $create = $this->privilegeService->store($req->input());
        if($create){
            $res = [
            'error' => $error,
            'msg' => $msg
            ];
            return response()->json($res,200);
        }else{
            $res = [
            'error' => 1,
            'msg' => 'duplicado'
            ];
            return response()->json($res,500);
        }
        }catch(\Exception $e){
            return response()->json(['error' => 500, 'msg' => 'error del servidor']);
        }
    }
    public function findAll(){
        try{
        $findAll = $this->privilegeService->findAll();
        $res = [
            'error' => 0,
            'results' => $findAll
        ];
        return response()->json($res,200);
        }catch(\Exception $e){
            dd($e);
            return response()->json(['error' => 500, 'msg' => 'error del servidor']);
        }
    }
    public function update(string $id, Request $req){
        try{
        $error = 0;
        $msg = 'update';
        $update = $this->privilegeService->update($id, $req->input());
        if($update){
            $res = [
                'error' => $error,
                'msg' => $msg
            ];
            return response()->json($res,200);
        }else{
            $res = [
                'error' => 1,
                'msg' => 'duplicado'
            ];
            return response()->json($res,500);
        }
        }catch(\Exception $e){
            return response()->json(['error' => 500, 'msg' => 'error del servidor']);
        }
    }
    public function delete(string $id){
        try{
        $error = 0;
        $msg = "delete";
        $delete = $this->privilegeService->delete($id);
        if($delete){
            $res = [
            'error' => $error,
            'msg' => $msg
            ];
            return response()->json($res,200);
        }
        }catch(\Exception $e){
            return response()->json(['error' => 500, 'msg' => 'error del servidor']);

        }
    }

}
