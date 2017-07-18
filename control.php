<?php 
 include('conexion.php');

 if(isset($_POST['submit']))
 {
 	 //Aquí es donde seleccionamos nuestro csv
         $fname = $_FILES['sel_file']['name'];
         $chk_ext = explode(".",$fname);
 
         if(strtolower(end($chk_ext)) == "csv")
         {
             //si es correcto, entonces damos permisos de lectura para subir
             $filename = $_FILES['sel_file']['tmp_name'];
             $handle = fopen($filename, "r");
 
             while (($data = fgetcsv($handle, 1000, ";")) !== FALSE)
             {
               //Insertamos los datos con los valores...
                $conn->query("INSERT into usuario(num,correo,num2,tipo) values('$data[0]','$data[1]','$data[2]','$data[3]')");
             }
             //cerramos la lectura del archivo "abrir archivo" con un "cerrar archivo"
             fclose($handle);
             echo "<h3>Se ha importado el archivo correctamente!</h3>";
         }
         else
         {
            //si aparece esto es posible que el archivo no tenga el formato adecuado, inclusive cuando es cvs, revisarlo para             
			//ver si esta separado por " , "
             echo "<h3>ARCHIVO INVALIDO!</h3>";

         }
 }	
 ?>

 <input type="button" value="VOLVER ATRAS" onclick="location='index.php'">