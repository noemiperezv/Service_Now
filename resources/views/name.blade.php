<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
</head>


<!--Copia desde aquí-->
<table style="max-width: 600px; padding: 10px; margin:0 auto; border-collapse: collapse;">
	<tr>
		<td style="padding: 0">
        <center>
			<img style="padding: 0; display: block" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQtIeUWjoDzHlIqLR84l8iFB4A-apQna6QQzw&usqp=CAU" width="30%">
        </center>
		</td>
	</tr>
	
	<tr>
		<td style="background-color: #ecf0f1">
			<div style="color: #34495e; margin: 4% 10% 2%; text-align: justify;font-family: sans-serif">
				<h2 style="color: #e67e22; margin: 0 0 7px">Hola {{$nombre}}!</h2>
				<p style="margin: 2px; font-size: 15px">
					Se te ha enviado una nueva tarea.<br>
				<ul style="font-size: 15px;  margin: 10px 0">
					<li>Correo registrado en la apliacion: {{$email}}</li>
					<li>Tarea Asignada: {{$tarea}}</li>
                    <li>Fecha Inicio: {{$fechaInicio}}</li>
                    <li>Fecha Fin: {{$fechaFin}}</li>
				</ul>
				<p>Descripción:</p>
				<p style="color: black; font-size: 14px; text-align: justify;margin: 10px 10px 10px;">{{$descripcion}}</p>
				<p style="color: #b3b3b3; font-size: 12px; text-align: center;margin: 30px 0 0">Service Now</p>
			</div>
		</td>
	</tr>
</table>
<!--hasta aquí-->
</body>
</html>
