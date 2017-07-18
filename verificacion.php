<?php 
 include('conexion.php');

 			  $Sintaxis='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';


	 		  $datos = $conn->query('SELECT * FROM usuario where id between '.$min.' and '.$max);

			  	foreach ($datos as $row) 
			  	{

			  		if(preg_match($Sintaxis,$row['correo']) && checkdnsrr($row['tipo']))
			  		{
			  			$conn->query('update usuario set valido="correcto" where id='.$row['id']);
			  		}
			  		else
			  		{
			  			$conn->query('update usuario set valido="No" where id='.$row['id']);
			  		}	
			  		
			  	}

 	             echo "<h3>SE HA HECHO LA VERIFICACIÓN CORRECTAMENTE!</h3>";
 ?> 

 <input type="button" value="VOLVER ATRAS" onclick="location='index.php'">