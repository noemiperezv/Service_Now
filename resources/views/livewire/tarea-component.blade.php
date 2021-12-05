<div>
  <!--Aquí mostraremos el mensaje si cualquier acción se realizo correctamente -->
  @if(session('success'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        {{session('success')}}
    </div>
    @endif

    @foreach($departamentoFin as $departamento)
    <input value="{{$departamento->IdDepartamento}}">{{$departamento->NombreDep}}</input>
    @endforeach


<br>
<section>
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
<form  action="{{url('EnvioTarea')}}" method = "post" >
@csrf
@if(!is_null($usuarios))
            @foreach($usuarios as $usuario)
        <tbody>
            @php ($i=1)
       
            <tr>
                <th scope="row">{{$i++}}</th>
                <td>{{$usuario->NomUsuario}}</td>
                <td>{{$usuario->Apellido}}</td>
               
                <td>{{$usuario->Correo}}<td>
                <td>{{$usuario->ROL}}<td>
                <td><center>{{$usuario->NombreDep}}</center><td>
                <td><input type="checkbox" name="" value="{{$usuario->Correo}}"/>
                
                </td>
                    <script>
                                        function toggle(source) {
                                        checkboxes = document.getElementsByName('correos[]');
                                        for(var i=0, n=checkboxes.length;i<n;i++) {
                                            checkboxes[i].checked = source.checked;
                                        }
                                        }
                     </script>
        </tr>
        @endforeach
    @endif
    </tbody>
    </table>
    <!-- Button trigger modal -->
<div >
      <button type="button" id="boton" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" >
        Launch demo modal
        </button>
</div>

 <!--
<script type="text/javascript">
 function activarcaja(){
    if(check.checked) {
      document.getElementById('boton').disabled=false
    } else {
      document.getElementById('boton').disabled=true
    }
  }
</script>  
-->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tarea</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="input-group">
      <span class="input-group-text">Proyecto</span>
        @foreach($proyectos as $proyecto)
        <input type="text-center" aria-label="Proyecto" name="proyecto" value="{{$proyecto->IdProyecto}}" > 
        @endforeach 
      </div>
      <br><br>
      <div class="input-group">
        <span class="input-group-text">Nombre de la actividad</span>
        <input type="text" aria-label="Actividad" name="actividad" value=""  class="form-control">
      </div><br>
      
      <div class="input-group">
        <span class="input-group-text">correo</span>
        @foreach($empleados as $empleado)
        <input type="checkbox" aria-label="empleados" name="empleados[]" value="{{$empleado->Correo}}" > {{$empleado->NomUsuario}}
        @endforeach 
        <!-- @if(!is_null($usuarios2))
        @foreach($usuarios2 as $usuario2)
        <input type="checkbox" aria-label="empleados2" name="empleados2[]" value="{{$usuario2->Correo}}" >
        @endforeach
        @endif -->
       </div><br>
      
       <div class="form-floating">
        <textarea class="form-control" name="descripcion" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
        <label for="floatingTextarea2" >Descripción</label>
       </div><br>
       <ul class="list-group list-group-horizontal">
        <li class="list-group-item">
            <label for="start">Fecha Inicio:</label>
            <input type="date" id="start" name="fechaInicio">
         </li>
        <li class="list-group-item">
        <label for="start">Fecha Inicio:</label>
            <input type="date" id="start" name="fechaFin">
        </li>
       </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="Submit" class="btn btn-primary">Enviar</button>
      </div>
    </div>
  </div>
</div>
</section>

</form>


</div>
