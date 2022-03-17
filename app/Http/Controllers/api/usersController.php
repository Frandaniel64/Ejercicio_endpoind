<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\usersResources;
use App\Models\users;

class usersController extends Controller
{

     public function index()
    {
        $res = usersResources::collection(users::all());
        if($res == null){
            return response()->json(['error' => 'No hay usuarios'], 404);
        }
        return response()->json($res, 200);
      
    }

    public function show($id)

    {
        $res =usersResources::collection(users::where('id', $id)
        ->where('deleted_at', null)
        ->get());

        if($res == null){
            return response()->json(['error' => 'No hay usuarios'], 404);
        }
        return response()->json($res, 200);
    }
    
 

  

}
