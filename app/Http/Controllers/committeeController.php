<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CommitteeService;
use App\Helpers\Message;

class committeeController extends Controller
{
    public function __construct(protected CommitteeService $committeeService){}
    public function store(request $req){
        try{
            $error = 0;
            $create = $this->committeeService->store($req->input());
            if($create){
                $res = [
                    'error' => $error,
                    'msg' => Message::stored()
                ];
                return response()->json($res,200);
            }else{
                $res = [
                    'error' => 1,
                    'msg' => Message::duplicate()
                ];
                return response()->json($res, 500);
            }
        }catch(\Exception $e){
           
            return response()->json(['error' => 500, Message::errorServer()]);
        }
    }

    public function findAll(){
        try{
            $findAll = $this->committeeService->findAll();
            $res = [
                'error' => 0,
                'result' => $findAll
            ];
            if(!empty($findAll)){
                return response()->json($res,200);
            }else{
                $res = [
                    'error' => 1,
                    'msg' => 'Sin Registros'
                ];
                return response()->json($res,500);
            }

        }catch(\Exception $e){

        }
    }

    public function findSubCommittee($parentId){
        try{
            $id = \Illuminate\Support\Facades\Crypt::decrypt($parentId);
        $sub = \App\Models\Committee::where('parent_id', $id)->get();

        return response()->json([
            'error' => 0,
            'results' => $sub

        ],200);

        }catch(\Exception $e){
           return response()->json(['error' => 1, 'msg' => 'Error al buscar subcomités'], 500);
        }
    }

    public function update(Request $req, string $id){
        try{
            $update = $this->committeeService->update($id, $req->input());
            if ($update) {
                return response()->json([
                    'error' => 0,
                    'msg' => Message::updated()
                ], 200);
            }

            return response()->json([
                'error' => 1,
                'msg' => Message::duplicate()
            ], 400);
        }catch(\Exception $e){
            return response()->json(['error' => 1, 'msg' => Message::errorServer()]);
        }
    }

    public function delete(string $id){
        try{
            $delete = $this->committeeService->delete($id);
            if ($delete) {
                return response()->json([
                    'error' => 0,
                    'msg' => Message::delete()
                ], 200);
            }

            return response()->json([
                'error' => 1,
                'msg' => 'No se pudo borrar'
            ], 500);
        }catch(\Exception $e){
            return response()->json(['error' => 500, 'msg' => Message::errorServer()]);

        }

    }
}
