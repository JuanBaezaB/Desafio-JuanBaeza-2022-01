<?php

namespace App\Http\Controllers;
use App\Models\CancionModel;
use App\Models\AlbumModel;
use App\Models\GeneroModel;
use App\Models\ArtistaModel;
use App\Models\GeneroCancionModel;
use App\Models\CancionArtistaModel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            $generos = $request->genero_id;
            $artistas = $request->artista_id;
            
            $datos = request()->except('genero_id','artista_id','_token');
            if($request->hasFile('audio')){
                $datos['audio'] = base64_encode(file_get_contents($request->file('audio')));
            }
            //return response()->json($datos,200);
            CancionModel::create($datos);
            $cancion_id = DB::table('cancion')->orderBy('created_at', 'desc')->first();

            //return response()->json($cancion_id->id,200);


            foreach ($generos as $genero) {
                GeneroCancionModel::create([
                    'cancion_id'=>$cancion_id->id,
                    'genero_id'=>$genero
                ]);
            }

            foreach ($artistas as $artista) {
                
                CancionArtistaModel::create([
                    'cancion_id'=>$cancion_id->id,
                    'artista_id'=>$artista
                ]);
            }
            
            

            

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
    public function edit($id){
        try{
            $albumes = AlbumModel::all();
            $generocanciones = GeneroCancionModel::all();
            $generos = GeneroModel::all();
            $artistas = ArtistaModel::all();
            $cancion = CancionModel::findOrFail($id);
            return response()->view('Cancion.cancionedit', compact('cancion','artistas','generos','albumes','generocanciones'));
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
