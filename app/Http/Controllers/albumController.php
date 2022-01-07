<?php

namespace App\Http\Controllers;
use App\Models\AlbumModel;

use Illuminate\Http\Request;

class albumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        try{
            $albumes = AlbumModel::all();
            return response()->view('albumes', compact('albumes'));
            //return response()->json($albumes,200);
        }catch(\Throwable $th){
            return $th;
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

    // Crear Album
    public function store(Request $request){
        try{
            AlbumModel::create($request->all());
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
    // Obtener Album
    public function show($id){
        try{
            $album = AlbumModel::find($id);
            return response()->json($album,200);
        }catch(\Throwable $th){
            return response()->json('Error al obtener el album',500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
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
            $album = AlbumModel::find($id);
            $album->titulo=$request->titulo;
            $album->fecha_lanzamiento=$request->fecha_lanzamiento; 
            $album->duracion=$request->duracion; 
            $album->imagen=$request->imagen;
            $album->artista_id=$request->artista_id;
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
            AlbumModel::destroy($id);
            return redirect('album');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
