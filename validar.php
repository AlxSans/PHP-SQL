<?php 

	include_once("conexion.php");
  
	//DATOS DEL FORMULARIO
	$user = $_POST["usuario"];
	$password = $_POST["clave"];
  
	//INICIADO LA CONEXIÓN CON LA BBDD.
	$conexion= mysqli_connect($bd_host, $bd_user, $bd_pass, $bd_name);

  //EN CASO DE QUE FALLE.
	if(mysqli_connect_errno()){

		echo "Fallo al conectar con la Base de Datos";
		
		exit();
	}

	// CREANDO UNA CONSULTA.
	$consulta = "SELECT * FROM users WHERE email='$user' and password='$password'";

	// HACIENDO EL REQUERIMIENTO.
	$resultado = mysqli_query($conexion, $consulta);

	//VALIDANDO LOS DATOS.
	$filas=mysqli_fetch_row($resultado);
	if ($filas>0) {
		# code...
		echo json_encode(array('error' => false));
	}else{
		
		echo json_encode(array('error'=> true));
	}



	mysqli_free_result($resultado);
	mysqli_close($conexion);

	

	

 ?>
