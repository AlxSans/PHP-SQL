<?php 
//Incluyendo el archivo de la conexión a la BBDD
include_once ("conexion.php");

//INICIADO LA CONEXIÓN CON LA BBDD.

	$conexion= mysqli_connect($bd_host, $bd_user, $bd_pass, $bd_name);

	if(mysqli_connect_errno()){

		echo "Fallo al conectar con la Base de Datos";
		
		exit();
	}

	if(!empty($_POST)){
		//Guardando los names del formulario en las variables.
		$usuario = $_POST[" "];
		$correoe = $_POST[" "];
		$clave = $_POST[" "];

			// CREANDO UNA CONSULTA. tabla, columna1, columna2, columna3 VALUES (las variables) 
		$consulta = "INSERT INTO tabla (name, email, password) VALUES ('$usuario', '$correoe','$clave')";

		// HACIENDO EL REQUERIMIENTO.
		$resultado = mysqli_query($conexion, $consulta);

		if ($resultado==false) {
			# code...
			echo "error en la consulta";
		}else{
			echo "Se han guardado los datos";
		}

	}


 ?>
