<?php 

$nombre_db="vivero";
$usuario_db="root";
$host="localhost";
$contraseña_db="";

if(!$link=mysqli_connect($host,$usuario_db,$contraseña_db))
{
	echo "<h1>No se pudo conectar al servidor</h1>";
	exit;
}
if (!mysqli_select_db($link,$nombre_db)) 
{
	echo "<h1>No se pudo conectar a la base de datos</h1>";
	exit;
}

?>