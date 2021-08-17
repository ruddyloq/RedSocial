<?php
//declarando variables para la conexion
$servidor = "localhost"; //el servidor que utilizaremos, en este caso sera localhost
$usuario = "root"; // El usuario de la base de datos
$contrasenha = "enbu12"; // La contraseña del usuario que utilizaremoss
$BD = "redsocial"; // El nombre de la base de datos

//creando la conexion
$conexion = mysqli_connect($servidor, $usuario, $contrasenha, $BD);

// verificando la conexion
if (!$conexion){
		
		echo "fallo la conexion <br> "; //enviar cadenas de texto al navegador
		die("connection failed: " . mysqli_connect_error());
		}
else{
	echo "conexion exitosa";
	}
	
?>