<?php 
	include('conexion.php');

	$conn->query('delete from usuario');

	header('location:index.php')
 ?>