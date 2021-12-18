<?php
	
  $link = new PDO('mysql:host=localhost;dbname=personas', 'root', '');

	$id = $_GET['id'];
	
	$sql = "DELETE FROM personas WHERE id = '$id'";
	$resultado = $link->query($sql);
	
?>

<html lang="es">
	<body>
		<div class="container">
			<div class="row">
				<div class="row" style="text-align:center">
				<?php if($resultado) { ?>
				<h3>REGISTRO ELIMINADO</h3>
				<?php } else { ?>
				<h3>ERROR AL ELIMINAR</h3>
				<?php } ?>
				
				<a href="index.php" class="btn btn-primary">Regresar</a>
				
				</div>
			</div>
		</div>
	</body>
</html>