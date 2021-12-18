<?php
$servername = "localhost";
$database = "personas";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
 $hola ="Conexion con la base de datos";
//mysqli_close($conn);
?>
<!--
	//$mysqli = new mysqli('localhost', 'root', '', 'personas');
	
	//$mysqli = new PDO('mysql:host=localhost;dbname=personas', 'root', '');
	if($mysqli->connect_error){
		
		die('Error en la conexion' . $mysqli->connect_error);	
	}
-->