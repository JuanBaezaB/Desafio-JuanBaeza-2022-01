<?php

namespace App\Http\Controllers;
use App\Models\AdminModel;

use Illuminate\Http\Request;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        try{
            $admins = AdminModel::all();
            return response()->json($admins,200);
        }catch(\Throwable $th){
            return response()->json('Error al obtener el admin',500);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return csrf_token();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        try{
            AdminModel::create($request->all());
        }catch(\Throwable $th){
            return $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        try{
            $admin = AdminModel::find($id);
            return response()->json($admin,200);
        }catch(\Throwable $th){
            return response()->json('Error al obtener el admin',500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        try {
            $album = AdminModel::find($id);
            $album->nombre=$request->nombre;
            $album->contraseña=$request->contraseña; 
            $album->correo=$request->correo; 
            $album->save();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        try {
            AdminModel::destroy($id);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
