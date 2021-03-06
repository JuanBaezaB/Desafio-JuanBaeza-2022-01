<?php


namespace App\Http\Controllers;

use App\Models\CancionModel;
use App\Models\AlbumModel;
use App\Models\GeneroModel;
use App\Models\ArtistaModel;
use App\Models\GeneroCancionModel;
use App\Models\CancionArtistaModel;

include_once __DIR__ . "/src/Mp3Info.php";

use wapmorgan\Mp3Info\Mp3Info;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class cancionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        try {
            $canciones = CancionModel::all();
            $albumes = AlbumModel::all();
            $generos = GeneroModel::all();
            $artistas = ArtistaModel::all();
            return response()->view('Cancion.canciones', compact('canciones', 'albumes', 'generos', 'artistas'));
            //return response()->json($canciones,200);
        } catch (\Throwable $th) {
            return response()->json('Error al obtener las canciones', 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $canciones = CancionModel::all();
        $albumes = AlbumModel::all();
        $generos = GeneroModel::all();
        $artistas = ArtistaModel::all();
        return response()->view('Cancion.cancioningresar', compact('canciones', 'albumes', 'generos', 'artistas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        try {

            $informacion = new Mp3Info($request->audio, true);
            $duracionEnSegundos = $informacion->duration;
            //return response()->json((INT)$duracionEnSegundos);
            $artistas = $request->selectartista;
            $generos = $request->selectgenero;
            
            if($generos==""){
                return back()->withErrors(['Selecciones algun genero', 'The Message']);
            }
            
            $datos = request()->except('genero_id', 'artista_id', '_token', 'selectgenero', 'selectartista');
            $datos['duracion'] = (int)$duracionEnSegundos;
            if ($request->hasFile('audio')) {
                $datos['audio'] = base64_encode(file_get_contents($request->file('audio')));
            }
            CancionModel::create($datos);
            $cancion_id = DB::table('cancion')->orderBy('created_at', 'desc')->first();

            foreach ($generos as $genero) {
                GeneroCancionModel::create([
                    'cancion_id' => $cancion_id->id,
                    'genero_id' => (int)$genero
                ]);
            }
            if($artistas!=""){
                foreach ($artistas as $artista) {
                    CancionArtistaModel::create([
                        'cancion_id' => $cancion_id->id,
                        'artista_id' => (int)$artista
                    ]);
                }
            }
            
            $album = AlbumModel::find($cancion_id->album_id);
            $album->duracion = $album->duracion + (int)$duracionEnSegundos;
            $album->save();

            return back()->with('mensaje', 'Nota agregada');
        } catch (\Throwable $th) {
            return $th;
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
        try {
            $cancion = CancionModel::find($id);
            return response()->json($cancion, 200);
        } catch (\Throwable $th) {
            return response()->json('Error al obtener la cancion', 500);
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
        $id_generos = array();
        $generocanciones = GeneroCancionModel::all();
        $i = 0;
        foreach ($generocanciones as $datos) {
            if ($datos->cancion_id == $id) {
                $id_generos[$i] = $datos->genero_id;
                $i++;
            }
        }
        $id_artistas = array();
        $artistacanciones = CancionArtistaModel::all();
        $i = 0;
        foreach ($artistacanciones as $dato) {
            if ($dato->cancion_id == $id) {
                $id_artistas[$i] = $dato->artista_id;
                $i++;
            }
        }

        try {
            $albumes = AlbumModel::all();
            $generos = GeneroModel::all();
            $artistas = ArtistaModel::all();
            $cancion = CancionModel::findOrFail($id);


            return response()->view('Cancion.cancionedit', compact('cancion', 'artistas', 'generos', 'albumes', 'id_generos', 'id_artistas'));
        } catch (\Throwable $th) {
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
    public function update(Request $request, $id)
    {
        //return response()->json($request,200);
        try {
            $generos = $request->selectgenero;
            //return response()->json($generos,200);
            if ($generos=="") {
                return back()->withErrors(['Selecciones algun genero', 'The Message']);
            }
            $cancion = CancionModel::find($id);

            $cancion->titulo = $request->titulo;

            $cancion->lyrics = $request->lyrics;

            if ($request->album_id != $cancion->album_id) {
                $album = AlbumModel::find($cancion->album_id);
                $album->duracion = $album->duracion - $cancion->duracion;
                $album->save();
                
                $album = AlbumModel::find($request->album_id);
                $album->duracion = $album->duracion + $cancion->duracion;
                $album->save();
            }

            if ($request->hasFile('audio')) {
                
                $informacion = new Mp3Info($request->audio, true);
                $duracionEnSegundos = $informacion->duration;

                $album = AlbumModel::find($request->album_id);

                $album->duracion = $album->duracion - $cancion->duracion + $duracionEnSegundos;

                $album->save();


                $cancion->duracion = $duracionEnSegundos;
                $cancion->audio = base64_encode(file_get_contents($request->file('audio')));
            }
            $cancion->album_id = $request->album_id;
            $cancion->save();

            GeneroCancionModel::destroy($id);
            CancionArtistaModel::destroy($id);
            

            //return response()->json($generos,200);
            $artistas = $request->selectartista;
            
            foreach ($generos as $genero) {
                GeneroCancionModel::create([
                    'cancion_id' => $id,
                    'genero_id' => (int)$genero
                ]);
            }
            if( $artistas!=""){
                foreach ($artistas as $artista) {
                    CancionArtistaModel::create([
                        'cancion_id' => $id,
                        'artista_id' => (int)$artista
                    ]);
                }
            }
            

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
    public function destroy($id)
    {
        try {

            $cancion = CancionModel::find($id);
            $album = AlbumModel::find($cancion->album_id);
            $album->duracion = $album->duracion - $cancion->duracion;
            $album->save();

            CancionModel::destroy($id);
            return redirect('cancion');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
