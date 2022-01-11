<?php

namespace App\Http\Controllers;
use App\Models\GeneroModel;

use Illuminate\Http\Request;

class generoController extends Controller
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

    public function index(){
        try{
            $generos = GeneroModel::all();
            return response()->view('Genero.generos', compact('generos'));
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
        $datos = request()->except('_token');

        try{
            GeneroModel::create($datos);
            return back()->with('mensaje', 'Nota agregada');
        }catch(\Throwable $th){
            return back()->with('mensaje', 'Nota agregada');
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
            $genero = GeneroModel::find($id);
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
            $genero = GeneroModel::find($id);
            $genero->nombre=$request->nombre;
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
            GeneroModel::destroy($id);
            return redirect('genero');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
