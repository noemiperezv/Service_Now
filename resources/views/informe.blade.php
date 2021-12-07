<?php
  if (isset($_POST['informe'])) {
      $informe = $_POST['informe'];
  }else{
      $informe=0;
  }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informes y cuadros de mando</title>
    @include('partials/header')
</head>
<body>
    @include('partials/navbar')
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        <h1 class="titulo">Informes recientes</h1>
        <div class="container mt-5">
            <div class="row">
                <div class="container" style="text-align:center;">
                    <form action="Informe" method="post">
                        @csrf
                        <p class="subtitulo">¿Cuál es el informe que desea generar?</p>
                        <button class="btn btn-success" type="submit" name="informe" value="1">Navegadores más usados</button>
                        <button class="btn btn-success" type="submit" name="informe" value="2">Gastos</button>
                        <button class="btn btn-success" type="submit" name="informe" value="3">Gastos por mes</button>
                    </form>
                </div>
                <?php
                    if($informe != 0){
                        ?>
                        <div class="container" id="container1">

                        </div>
                        <div class="container" id="container2">

                        </div>
                        <?php
                    }
                ?>
                
            </div>
        </div>
    </div>
    
    @include('partials/scripts')
    
        <?php if($informe != 0){
            echo $tipo;
            }?>
    
</body>
</html>