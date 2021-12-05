<!doctype html>
<html lang="es">
  <head>
  @livewireStyles
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/tareas.css') }}" rel="stylesheet">
    <script src="{{ asset('js/form.js') }}" ></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>proyectos</title>
   
  </head>
  <body>
  @include('partials/navbar')
      <section class="Principal">
        <h1>Proyectos</h1>
      </section>
    
    
<div align="center" class="card" id="card1" >
@if(session('success'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        {{session('success')}}
    </div>
    @endif
    <form  action="{{url('EnvioProyecto')}}" method = "post" >
        @csrf
        <ul class="list-group list-group-horizontal">
        <li class="list-group-item">
            <select class="form-select" name="proyecto" >
                <option value="" selected>Proyectos</option>
                @foreach($proyectosO as $proyecto)
                <option value="{{$proyecto->IdProyecto}}">{{$proyecto->NomProyecto}}</option>
                @endforeach
        </select>
        </li>
        <li class="list-group-item">
            <select class="form-select" name="departamento"  >
                <option value="" selected>Departamentos</option>
                @foreach($departamentos as $departamento)
                <option value="{{$departamento->IdDepartamento}}">{{$departamento->NombreDep}}</option>
                @endforeach
            </select></li>
        <li class="list-group-item">
        <button type="submit" class="btn btn-success">Listo</button>
        </li>
        </ul>
    </form>

</div>










    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    @livewireScripts
  </body>
</html>