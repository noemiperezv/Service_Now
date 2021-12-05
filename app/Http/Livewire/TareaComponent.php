<?php

namespace App\Http\Livewire;

use Livewire\Component;
Use App\Models\Departamento;
Use App\Models\Usuario;
Use App\Models\Proyecto;


class TareaComponent extends Component
{
    public $selectedDepa = null;
    public $usuarios = null;
    public $selectedEmpleados = null;
    public $usuarios2 = null;
  
    
    public function render()
    {
        $proyectos = Proyecto::all();
        $empleados = Usuario::all();
        $departamentos= Departamento::all();
        return view('livewire.tarea-component',compact('proyectos', 'empleados', 'departamentos'));
    }
    public function updatedselectedDepa($depa)
    {
        
       $this->usuarios = Usuario::select('usuario.*', 'departamento.NombreDep')
       ->join('departamento', 'usuario.idDepartamento', '=', 'departamento.IdDepartamento')
       ->where('departamento.IdDepartamento', '=', $depa)
       ->get();
       $this->usuarios2 =  Usuario::all();
    }

   
}
