<?php
	
	require 'conexion.php';
	
	$nombre = $_POST['nombre'];
	$apellido =$_POST['apellido'];
	$descripcion =$_POST['descripcion'];
	
	
	$sql = "INSERT INTO persona (Nombre, Apellido, descripción) VALUES ('$nombre', '$apellido', '$descripcion')";
	$resultado = mysqli_query( $conn, $sql);	
	
?>