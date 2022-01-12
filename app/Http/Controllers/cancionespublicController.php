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

class cancionespublicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $canciones = CancionModel::all();
        $albumes = AlbumModel::all();
        $generos = GeneroModel::all();
        $artistas = ArtistaModel::all();
        return response()->view('user_public.canciones', compact('canciones','albumes','generos','artistas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $visitas = DB::select('SELECT visitas FROM cancion WHERE id = '.$id.'');
        $visit = $visitas[0]->visitas;
        $visit++;
        DB::update('UPDATE cancion SET visitas = '.$visit.' WHERE id = '.$id.'');

        $cancion = CancionModel::findOrFail($id);
        $canciones = CancionModel::all();
        $albumes = AlbumModel::all();
        $generos = GeneroModel::all();
        $artistas = ArtistaModel::all();
        return response()->view('user_public.cancion', compact('canciones','albumes','generos','artistas','cancion'));
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
