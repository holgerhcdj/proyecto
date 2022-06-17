<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\User;

class PersonasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $personas=DB::select("SELECT * FROM personas");
        return view('personas.index')
        ->with('personas',$personas)
        ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('personas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos=$request->all();
        $Usuario=new User();

        $Usuario->email=$datos['email']; 
        $Usuario->per_cedula=$datos['per_cedula'];
        $Usuario->per_apellidos=$datos['per_apellidos'];
        $Usuario->per_nombres=$datos['per_nombres'];
        $Usuario->per_direccion=$datos['per_direccion'];
        $Usuario->per_telefono=$datos['per_telefono'];
        $Usuario->per_fecha_nacimiento=$datos['per_fecha_nacimiento'];
        $Usuario->per_estado_civil=$datos['per_estado_civil'];
        $Usuario->per_sexo=$datos['per_sexo'];
        $Usuario->per_usuario=$datos['per_usuario'];
        $Usuario->per_tipo=$datos['per_tipo'];
        $Usuario->password=bcrypt($datos['password']);
        $Usuario->save();

        return redirect(route('personas.index'));


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
       $personas=DB::select("SELECT * FROM personas where per_id=$id");
        return view('personas.edit')
        ->with('personas',$personas[0])
        ;
        

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

        $datos=$request->all();
        $Usuario=User::find($id);

        $Usuario->email=$datos['email']; 
        $Usuario->per_cedula=$datos['per_cedula'];
        $Usuario->per_apellidos=$datos['per_apellidos'];
        $Usuario->per_nombres=$datos['per_nombres'];
        $Usuario->per_direccion=$datos['per_direccion'];
        $Usuario->per_telefono=$datos['per_telefono'];
        $Usuario->per_fecha_nacimiento=$datos['per_fecha_nacimiento'];
        $Usuario->per_estado_civil=$datos['per_estado_civil'];
        $Usuario->per_sexo=$datos['per_sexo'];
        $Usuario->per_usuario=$datos['per_usuario'];
        $Usuario->per_tipo=$datos['per_tipo'];
        $Usuario->password=bcrypt($datos['password']);
        $Usuario->update();
        return redirect(route('personas.index'));

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
