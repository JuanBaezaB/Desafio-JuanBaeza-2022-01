<?php

namespace App\Http\Controllers;
use App\Models\ArtistaModel;

use Illuminate\Http\Request;


class artistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(){
        
        try{
            $artistas = ArtistaModel::all();
            return response()->view('Artista.artistas', compact('artistas'));
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
        return response()->view('Artista.artistaingresar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request){
        try{
            $datos = request()->except('_token');
            if($request->hasFile('imagen')){
                $datos['imagen'] = base64_encode(file_get_contents($request->file('imagen')));
            }
            ArtistaModel::create($datos);
            return back()->with('mensaje', 'Nota agregada');
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
            $artista = ArtistaModel::find($id);

            return response()->json($artista,200);
        }catch(\Throwable $th){
            return response()->json('Error al obtener el artista',500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        try{
            $artista = ArtistaModel::findOrFail($id);
            return response()->view('Artista.artistaedit', compact('artista'));
        }catch(\Throwable $th){
            return $th;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        //$datos = request()->except('_token','_method');
        //return response()->json($datos,200);
        try {
            $artista = ArtistaModel::find($id);
            $artista->nombre=$request->nombre;
            if($request->hasFile('imagen')){
                $artista['imagen'] = base64_encode(file_get_contents($request->file('imagen')));
            }
            $artista->descripcion=$request->descripcion; 
            $artista->save();
            return back();
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

    public function destroy($id) {
        try {
            ArtistaModel::destroy($id);
            //$artistas = ArtistaModel::all();
            //return response()->view('artistas', compact('artistas'));
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }
}
