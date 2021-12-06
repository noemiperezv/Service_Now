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
                <div class="container" id="container1">

                </div>
                <div class="container" id="container2">

                </div>
            </div>
        </div>
    </div>
    
    @include('partials/scripts')
    
        <?php echo $tipo?>
    
</body>
</html>