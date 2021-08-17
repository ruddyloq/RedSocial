<?php
include("conexion.php"); //el include es para llamar a un archivo, en este caso el de conexion
//declarando variables para recibir y guardar los datos de desde el formulario
$nickname = $_POST("nickname");
$nombre = $_POST("nombre");
$apellidos = $_POST("apellidos");
$edad = $_POST("edad");
$descripcion = $_POST("descripcion");
$email = $_POST("email");
$password = $_POST("password");

$passwordHash = password_hash($password, PASSWORD_BCRYPT);//BCRYPT es el algoritmo de encriptacion, devuelve una cadena de 60 caracteres




?>