<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<body>
<?php 
	include('conexion.php');
 ?>
	 <div align="center">
	 <h3>IMPORTAR ARCHIVO CON EXTENSIÓN CSV Y VERIFICAR CORREOS</h3>
		  <h3>Estructura</h3>
	 	  <img src="estructura.png">
		  <br>
		  <h3>Importación de archivo</h3>
	 	  <form action='control.php' method='post' enctype="multipart/form-data" >
		   Importar Archivo : <input type='file' name='sel_file' size='20' id="file">
		   <input type='submit' name='submit' value='IMPORTAR'>
		  </form>
	<br>
	<input type="button" onclick="location='generar_excel.php'" id="excel"  value="GENERAR EXCEL CORREOS VERIFICADOS" style="display:none" />
	
	<input type="button" onclick="location='eliminar_todo.php'" id="elimina"  value="ELIMINAR TODOS LOS REGISTROS" style="display:none" />

	<input type="button" onclick="location='verificacion.php'" id="verifica"  value="VERIFICAR CORREOS Y DOMINIOS" style="display:none" />
	<br>
	<br>
	<hr>

	 <?php 
	 		  if (count($min)>0 && count($max)>0) {
	 		  		$datos = $conn->query('SELECT * FROM usuario where id between '.$min.' and '.$max);
	 		  }

			  if (!isset($datos)) 
			  {
			  	echo "<div style='width:500px;height:30px;background:#FFB5B5'>No hay registros para listar</div>";
			  }
			  else
			  {
			  	echo "<script>$('#excel').fadeIn(1500); $('#elimina').fadeIn(1500);</script>";
			  	echo "<script>$('#excel').fadeIn(1500); $('#verifica').fadeIn(1500);</script>";

				 $datos = $conn->query('SELECT * FROM usuario where id between '.$min.' and '.$max);

			  	echo "<table border='2'>".
			  	"<thead>".
			  	"<tr>".
			  	"<th>Num</th>".
				"<th>Correo</th>".
				"<th>Dominio</th>".
				"<th>Valido</th>".
				"</tr>".
			  	"</thead>";
			  	foreach ($datos as $row) {
			  		echo 
			  		"<tbody>".
					"<tr>".
			  		"<td>".$row['num']."</td>".
			  		"<td>".$row['correo']."</td>".
			  		"<td>".$row['tipo']."</td>".
			  		"<td>".$row['valido']."</td>".
			  		"</tr>".
			  		"</tbody>";
			  	}
			  	echo "</table>";
			  }
	  ?>

	 </div>

</body>
</html>