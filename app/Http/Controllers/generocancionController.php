<?php

namespace App\Http\Controllers;
use App\Models\GeneroCancionModel;

use Illuminate\Http\Request;

class generocancionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        try{
            $generos = GeneroCancionModel::all();
            return response()->json($generos,200);
        }catch(\Throwable $th){
            return response()->json('Error al obtener los generos',500);
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
            GeneroCancionModel::create($request->all());
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
            $genero = GeneroCancionModel::find($id);
            return response()->json($genero,200);
        }catch(\Throwable $th){
            return response()->json('Error al obtener el genero',500);
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
            $genero = GeneroCancionModel::find($id);
            $genero->cancion_id=$request->cancion_id;
            $genero->genero_id=$request->genero_id;
            $genero->save();
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
            GeneroCancionModel::destroy($id);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
