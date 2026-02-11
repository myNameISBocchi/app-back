<?php

namespace App\Http\Controllers;
use App\Services\RoleService;

use Illuminate\Http\Request;

class roleController extends Controller
{
    public function __construct(protected RoleService $roleServices){}
    public function store(Request $req){
        try{
            $error = 0;
            $msg = 'saved';
            $create = $this->roleServices->store($req->input());
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
            dd($e);
            return response()->json(['error' => 500, 'msg' => 'error del servidor']);
        }
    }
    public function findAll(){
        try{
        $findAll = $this->roleServices->findAll();
        $res = [
            'error' => 0,
            'results' => $findAll
        ];
        return response()->json($res,200);
        }catch(\Exception $e){
            dd($e);
            return response()->json(['error' => 500, 'msg' => 'erro del servidor']);
        }
    }
    public function update(string $id, Request $req){
        try{
            $error = 0;
            $msg = 'update';
            $update = $this->roleServices->update($id, $req->input());
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
                return response()->json($res, 500);
            }
        }catch(\Exception $e){
            dd($e);
            return response()->json(['error' => 500, 'msg' => 'error del servidor']);
        }

    }
    public function delete(string $id){
        try{
        $error = 0;
        $msg = 'delete';
        $delete = $this->roleServices->delete($id);
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
