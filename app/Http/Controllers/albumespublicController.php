<?php

namespace App\Http\Controllers;
use App\Models\CancionModel;
use App\Models\AlbumModel;
use App\Models\GeneroModel;
use App\Models\ArtistaModel;
use App\Models\GeneroCancionModel;
use App\Models\CancionArtistaModel;

use Illuminate\Http\Request;

class albumespublicController extends Controller
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
        return response()->view('user_public.albumes', compact('canciones','albumes','generos','artistas'));
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
        return response()->view('user_public.albumes', compact('canciones','albumes','generos','artistas'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $album = AlbumModel::findOrFail($id);
        $albumes = AlbumModel::all();
        $canciones = CancionModel::all();
        $generos = GeneroModel::all();
        $artistas = ArtistaModel::all();
        return response()->view('user_public.album', compact('canciones','album','generos','artistas','albumes'));
        
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
