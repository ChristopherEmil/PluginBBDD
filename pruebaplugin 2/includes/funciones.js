function ResgistrarUsuario(){

	//alert("hola");
 var datos=$("#form_registrar").serialize();
 alert(datos);

 $.ajax({
    method:'POST',
    url:'../wp-content/plugins/pruebaplugin 2/includes/nuevo.php',
    data:datos,
    success: function (e) {
    
alert("registrado");
        
    }
    
 });
 }