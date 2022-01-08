<?php

namespace App\Http\Controllers;
use App\Models\CancionModel;
use App\Models\AlbumModel;
use App\Models\GeneroModel;
use App\Models\ArtistaModel;

use Illuminate\Http\Request;

class cancionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        try{
            $canciones = CancionModel::all();
            $albumes = AlbumModel::all();
            $generos = GeneroModel::all();
            $artistas = ArtistaModel::all();
            return response()->view('Cancion.canciones', compact('canciones','albumes','generos','artistas'));
            //return response()->json($canciones,200);
        }catch(\Throwable $th){
            return response()->json('Error al obtener las canciones',500);
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
            CancionModel::create($request->all());
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
            $cancion = CancionModel::find($id);
            return response()->json($cancion,200);
        }catch(\Throwable $th){
            return response()->json('Error al obtener la cancion',500);
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
            $cancion = CancionModel::find($id);
            $cancion->titulo=$request->titulo;
            $cancion->duracion=$request->duracion; 
            $cancion->lyrics=$request->lyrics; 
            $cancion->audio=$request->audio;
            $cancion->album_id=$request->album_id;
            $cancion->save();
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
            CancionModel::destroy($id);
            return redirect('cancion');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
