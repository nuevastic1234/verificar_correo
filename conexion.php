<?php
ini_set('max_execution_time', 9000); 

try{
    $conn = new PDO('mysql:host=localhost;dbname=veririca_correo','root','');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "ERROR: " . $e->getMessage();
}


  			  $max=$conn->query('select max(id) from usuario')->fetch(PDO::FETCH_COLUMN);
	 		  $min=$conn->query('select min(id) from usuario')->fetch(PDO::FETCH_COLUMN);
?>
