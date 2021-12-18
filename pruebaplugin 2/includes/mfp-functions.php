
<!-- Latest minified bootstrap css -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

<!-- Latest minified bootstrap js -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="..\wp-content\plugins\pruebaplugin 2\includes\funciones.js"></script>

<?php
	require 'conexion.php';
//mysqli_close($conn);
	/*$where = "";
	
	if(!empty($_POST))
	{
		$valor = $_POST['campo'];
		if(!empty($valor)){
			$where = "WHERE Nombre LIKE '%$valor'";
		}
	}*/
	$sql = "SELECT * FROM persona";
	//$resultado = $conn->query($sql);
$resultado = mysqli_query( $conn, $sql );	
?>
<?php
/*
 * Add my new menu to the Admin Control Panel
 */
 
// Hook the 'admin_menu' action hook, run the function named 'mfp_Add_My_Admin_Link()'
add_action( 'admin_menu', 'mfp_Add_My_Admin_Link' );
 
// Add a new top level menu link to the ACP
function mfp_Add_My_Admin_Link()
{
    /*  add_menu_page(
        'My First Page', // Title of the page
        'My First Plugin', // Text to show on the menu link
        'manage_options', // Capability requirement to see the link
        'prueba', // The 'slug' - file to display when clicking the link
        'page_content'
      );*/

      add_menu_page ( 'Tabla', 'Tabla', 'read', 'prueba', '', '', 101);
add_submenu_page( 'prueba', 'MostrarDatos', 'MostrarDatos', 'read', 'mostrar', 'MostarDatos');
add_submenu_page( 'prueba', 'Editar', 'Editar', 'upload_files', 'editar', 'EditarDatos');
//add_submenu_page( 'colores.php', 'Amarillo', 'Amarillo', 'read', 'amarillo.php', '');
   

}

function page_content(){
  echo '<div class="wrap"><h2>Testing</h2></div>' ;
}



 
function EditarDatos(){
	global $hola, $resultado;
	
	?>
  <script type="text/javascript">
	  $(document).ready(function(){
		  $("#btn_reguistrar").on('click', function(e){
			  e.preventDefault();
			  ResgistrarUsuario();
		  });
	  });

  </script>
  <div class="container">
       <div class="row">
         <h2 style="text-align:center">Mostrar datos</h2>
       </div>
       

	   <!-- Agregar Usuarios-->
<button class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalForm">
    Nuevo registro
</button>

<!-- Modal -->
<div class="modal fade" id="modalForm" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Datos</h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form role="form" id="form_registrar" method="post">
                    <div class="form-group">
                        <label for="inputName">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre"/>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Apellido</label>
                        <input type="email" class="form-control" name="apellido" id="apellido" placeholder="Apellido"/>
                    </div>
                    <div class="form-group">
                        <label for="inputMessage">Descripcion</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion"></textarea>
                    </div>
                </form>
            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" name="btn_reguistrar" id="btn_reguistrar" class="btn btn-primary submitBtn">Registrar</button>
            </div>
        </div>
    </div>
</div>
	   <h1><?php echo $hola ?></h1>
     </div>

     <div class="row table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nombre</th>
							<th>Apellido</th>
							<th>Descripcion</th>
							<th>Modificar</th>
							<th>Eliminar</th>
						</tr>
					</thead>
					<tbody>
						<?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
							<tr>
								<td><?php echo $row['ID']; ?></td>
								<td><?php echo $row['Nombre']; ?></td>
								<td><?php echo $row['Apellido']; ?></td>
								<td><?php echo $row['Descripción']; ?></td>
								<td></span><button class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalactualizar">
                                <span class="glyphicon glyphicon-pencil"></button></td>
							<!--	<td><a href="#" data-href="eliminar.php?id=<?php echo $row['ID']; ?>" data-toggle="modal" data-target="#confirm-delete"><span class="glyphicon glyphicon-trash"></span></a></td>
                        --></tr>
						<?php } ?>
					</tbody>
				</table>
			</div>

		<!--Actualizar Datos-->
		<div class="modal fade" id="modalactualizar" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Datos</h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form role="form" id="form_actualizar" method="post">
                <div class="form-group">
                        <label for="inputName">ID</label>
                        <input type="text" class="form-control" name="aid" id="aid" placeholder="Enter your name"/>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Nombre</label>
                        <input type="text" class="form-control" name="anombre" id="anombre" placeholder="Enter your name"/>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Apellido</label>
                        <input type="email" class="form-control" name="aapellido" id="aapellido" placeholder="Enter your email"/>
                    </div>
                    <div class="form-group">
                        <label for="inputMessage">Descripcion</label>
                        <textarea class="form-control" id="adescripcion" name="adescripcion" placeholder="Enter your message"></textarea>
                    </div>
                </form>
            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" name="btn_actualizar" id="btn_actualizar" class="btn btn-primary submitBtn">Actualizar</button>
            </div>
        </div>
    </div>
</div>
 
 <?php }

 	
add_shortcode('MostarDatos', 'MostarDatos');
function MostarDatos(){
    global $resultado;
    ?>
    <div class="row table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Descripcion</th>

            </tr>
        </thead>
        <tbody>
            <?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
                <tr>
                    <td><?php echo $row['ID']; ?></td>
                    <td><?php echo $row['Nombre']; ?></td>
                    <td><?php echo $row['Apellido']; ?></td>
                    <td><?php echo $row['Descripción']; ?></td>
                 </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php 
}