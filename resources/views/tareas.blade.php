<!doctype html>
<html lang="es">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/tareas.css') }}" rel="stylesheet">
    <script src="{{ asset('js/form.js') }}" ></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Asignacion de Tareas</title>
  </head>
  <body>
  @include('partials/navbar')
    <section class="Principal">
      <h1>Asignacion de tareas</h1>
    </section>
    
<div align="center" class="card  " id="card2" >
    @if(session('success'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        {{session('success')}}
    </div>
    @endif

<form  action="{{url('EnvioTarea')}}" method = "post" >
@csrf

    @foreach($proyectoFin as $proyecto)
    <input type="text-center" aria-label="proyecto" name="proyecto" value="{{$proyecto->IdProyecto}}"> 
    @endforeach

    <table  class="table" id="table1">
        <thead>
            <tr>
                <th >Número</th>
                <th >Nombre</th>
                <th >Apellido</th>
                <th >Correo</th>
                <th ></th>
                <th >Rol</th>
                <th ></th>
                <th >Departamento</th>
                <th> </th>
                <th> Seleccionar</th>

             
            </tr>
        </thead>

@if(!is_null($usuarios))
            @foreach($usuarios as $usuario)
        <tbody>
            @php($i=1)
            <tr>
                <th scope="row">{{$i++}}</th>
                <td>{{$usuario->NomUsuario}}</td>
                <td>{{$usuario->Apellido}}</td>
               
                <td>{{$usuario->Correo}}<td>
                <td>{{$usuario->ROL}}<td>
                <td><center>{{$usuario->NombreDep}}</center><td>
                <td><center><input type="checkbox" name="empleados[]" value="{{$usuario->Correo}}"/></center></td>
        </tr>
        @endforeach
    @endif
    </tbody>
    </table>
    
      <br><br>
      <div class="input-group" style="width: 950px">
        <span class="input-group-text">Nombre de la actividad</span>
        <input type="text" aria-label="Actividad" name="actividad" value=""  class="form-control">
      </div><br>
      
     <br>
      
       <div class="form-floating">
        <textarea class="form-control" name="descripcion" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px; width: 850px"></textarea>
        <label for="floatingTextarea1" >Descripción</label>
       </div>
       <br>
       <ul class="list-group list-group-horizontal">
        <li class="list-group-item">
            <label for="start">Fecha Inicio:</label>
            <input type="date" id="start" name="fechaInicio">
         </li>
        <li class="list-group-item">
        <label for="start">Fecha Inicio:</label>
            <input type="date" id="start" name="fechaFin">
        </li>
       </ul><br>
       <button type="Submit" class="btn btn-primary">Enviar</button>
      </div>
    
        
 
</form>
</div>










    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  
  </body>
</html>