<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\user_filesResources;
use Illuminate\Http\Request;
use App\Models\user_files;
use Illuminate\Support\Facades\Storage;


class filesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* $files = user_files::all(); */
     /*    return userstoreResources::collection(user_files::find('1')); */
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->user_id == null || $request->file == ''){
            return response()->json(['error' => 'Falta un Atributo'], 400);
            
        }else{
            if($request->hasFile('file')){
                $nombreArchivo = $request->file('file')->getClientOriginalName(); 
                 $url = Storage::put('public/', $request->file('file'));
                 $file = user_files::create([
                     'file_name' => $nombreArchivo,
                     'url' => $url,
                     'user_id' => $request->user_id,
                 ]);
             }
             $datos = user_files::where('user_id', $request->user_id)
             ->where('deleted_at', null)
             ->orderBy('file_name', 'asc')
             ->orderBy('created_at', 'asc')
             ->get();
     
             $res = [
                 'user_id' => $request->user_id,
                 'uploaded_file' => [
                                    'id' => $file->id,
                                    'file_name' => $file->file_name,
                                    'url' => $file->url,
                                    'create_at' => $file->created_at,
                 ],
                 'file' => $datos,
             ];
             
             
             
             return response()->json($res, 201);
        }
        
        
       
  

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        return user_filesResources::collection(user_files::where('user_id', $id)->get());
    } 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
