<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PacientesModel;

class PacientesController extends Controller
{
     public function __construct(){
         $this->middleware('auth');
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //return view('crud.index');
        $pacientes = PacientesModel::all();
        return view('crud.index')->with('paciente',$pacientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $pacientes = new PacientesModel();

        $pacientes->id = $request->get('id');     
        $pacientes->documento = $request->get('documento');
        $pacientes->tipoDocumento = $request->get('tipoDocumento');
        $pacientes->nombres = $request->get('nombres');
        $pacientes->apellidos = $request->get('apellidos');
        $pacientes->direccion = $request->get('direccion');
        $pacientes->telefono = $request->get('telefono');
        $pacientes->genero = $request->get('genero');
        $pacientes->fechaNacimiento = $request->get('fechaNacimiento');
        $pacientes->estadoCivil = $request->get('estadoCivil');


        $pacientes->save();

        return redirect('/crud');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pacientes = PacientesModel::find($id);
        return view('crud.edit')->with('paciente',$pacientes);
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
        $pacientes = PacientesModel::find($id);

        $pacientes->id = $request->get('id');     
        $pacientes->documento = $request->get('documento');
        $pacientes->tipoDocumento = $request->get('tipoDocumento');
        $pacientes->nombres = $request->get('nombres');
        $pacientes->apellidos = $request->get('apellidos');
        $pacientes->direccion = $request->get('direccion');
        $pacientes->telefono = $request->get('telefono');
        $pacientes->genero = $request->get('genero');
        $pacientes->fechaNacimiento = $request->get('fechaNacimiento');
        $pacientes->estadoCivil = $request->get('estadoCivil');

        $pacientes->save();

        return redirect('/crud');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pacientes = PacientesModel::find($id);
        $pacientes->delete();
        return redirect('/crud');
    }
}