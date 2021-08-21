<?php
include("conexion.php"); //el include es para llamar a un archivo, en este caso el de conexion

//declarando variables para recibir y guardar los datos de desde el formulario
$nickname 		= $_POST["nickname"];
$nombre 		= $_POST["nombre"];
$apellidos		= $_POST["apellidos"];
$edad 			= $_POST["edad"];
$descripcion 	= $_POST["descripcion"];
$email 			= $_POST["correo"];
$password 		= $_POST["contraseña"];


$passwordHash = password_hash($password, PASSWORD_BCRYPT);//BCRYPT es el algoritmo de encriptacion, devuelve una cadena de 60 caracteres
$fotoPerfil = "../img/$nickname/perfil.jpg";//ingresamos el nombre del a foto de perfil por defecto

//evaluamos si el nickname ya existe
$consultaId = "SELECT Nickname FROM persona where Nickname= '$nickname' ";
$consultaId = mysqli_query($conexion, $consultaId);
$consultaId = mysqli_fetch_array($consultaId);
if(!$consultaId){
	
	$sql = "INSERT INTO persona VALUES ( '$nickname', '$nombre', '$apellidos', '$edad', '$descripcion', 'fotoPerfil' , '$email', '$passwordHash' )";
	/* ejecutamos y verificamos si se guardan los datos*/
	if (mysqli_query($conexion, $sql))	{
		mkdir("../img/$nickname"); //Creamos una carpeta en imagenes para el usuario
		copy("../img/default.jpg", "../img/$nickname/perfil.jpg");//copiamos nuestra foto por default	
		echo "tu cuenta ha sido creada.";
		echo "<br><a href='../index.html' >Iniciar Sesión</a></div>";
	}
	else {
		echo "Error:" .$sql. "<br>".mysqli_error($conexion);	
	}
}
	
else{
	echo "El nickname ya existe";
	
	echo "<a href='../index.html'>Intentalo de nuevo</a></div>";

	}

//cerrando la conexion
mysqli_close($conexion);
?>