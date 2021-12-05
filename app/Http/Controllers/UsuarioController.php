<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Departamento;
use App\Models\Actividad;
use App\Models\Proyecto;
use App\Mail\SendEmail;
use Mail;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request )
    {
        $proyectosO = Proyecto::all();
        $departamentos = Departamento::all();
       

        return view('proyectos', compact('proyectosO', 'departamentos'));

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
    public function EnvioProyecto(Request $request){
        $finalPro = $request['proyecto'];
        if(empty($finalPro)){
            return back()->with('success', 'Elija un Proyecto o no podra avanzar..');
        }
        $finalDe = $request['departamento'];
        if(empty($finalDe)){
            return back()->with('success', 'Elija un Departamento o no podra avanzar..');
        }

        $proyectoFin = Proyecto::Where('IdProyecto', $finalPro)->get();
        
        $usuarios = Usuario::select('usuario.*', 'departamento.NombreDep')
       ->join('departamento', 'usuario.idDepartamento', '=', 'departamento.IdDepartamento')
       ->where('departamento.IdDepartamento', '=', $finalDe)
       ->get();

       return View('tareas', compact('proyectoFin', 'usuarios'));
    }

    public function EnvioTarea(Request $request){
        $emails = $request['empleados'];
       
       /* if(empty($emails)){
            return back()->with('success', 'Mal');
        }*/
        $proyecto = $request['proyecto'];
        $actividadUno = $request['actividad'];
        $descripcion = $request['descripcion'];
        $fechaInicio = $request['fechaInicio'];
        $fechaFin = $request['fechaFin'];
        foreach($emails as $email){
            
            $empleados = Usuario::where('Correo', $email)->first();
           
            $prueba = "";
            $prueba = $empleados->IdUsuario;
            $nombre = $empleados->NomUsuario;
    
            $actividad = new Actividad();
            $actividad->NomActividad = $actividadUno;
            $actividad->Description = $descripcion;
            $actividad->FechaInicio = $fechaInicio;
            $actividad->FechaFin = $fechaFin;
            $actividad->IdUsuario = $prueba;
            $actividad->IdProyecto = $proyecto;
            $details = [
                'title' => 'Titulo',
                'body' => 'Codigo',
                'email' => $email,
                'tarea' => $request['actividad'],
                'fechaInicio' => $request['fechaInicio'],
                'fechaFin' => $request['fechaFin'],
                'descripcion' => $request['descripcion'],
                'nombre' => $nombre,
                
            ];
           
            Mail::to($email)->send(new \App\Mail\SendEmail($details));
            $actividad->save();

        }
        $proyectosO = Proyecto::all();
        $departamentos = Departamento::all();
       

       return view('proyectos', compact('proyectosO', 'departamentos'))->with('success', 'Tarea Enviada');
      // return redirect()->back(); 
      //return back()->with('success', 'Examen Creado Correctamente..');
      
    }
}
