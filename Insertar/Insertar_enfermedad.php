<!DOCTYPE html>
<html>
<head>
	<title>Insertar empleados</title>
</head>
<body>
	<?php 
	$cedula=$_POST["cedula"];
	$nombre=$_POST["nombre"];
	$apellido1=$_POST["apellido1"];
	$apellido2=$_POST["apellido2"];
	$telefono=$_POST["telefono"];
	$error=false;
/*Validaciones*/
	if (empty($cedula) || !is_numeric($cedula)) {
		echo "<p>Cedula vacio ó no valido.</p>";
		$error=true;
	}
	if (empty($nombre) || is_numeric($nombre)) {
		echo "<p>Nombre vacio ó no valido</p>";
		$error=true;
	}
	if (empty($apellido1) || is_numeric($apellido1)) {
		echo "<p>Apellido vacio ó no valido</p>";
		$error=true;
	}
	if (empty($apellido2) || is_numeric($apellido2)) {
		echo "<p>Apellido vacio ó no valido</p>";
		$error=true;
	}
	if (empty($telefono) || !is_numeric($telefono)) {
		echo "<p>Telefono vacio ó no valido</p>";
		$error=true;
	}
	if ($error)
	{
		echo"<button onclick=location.href='insertar_empleado.html'>Pagina anterior</button>";
	}else
	{
		require('../conexion.php');
                
                $sql="SELECT `cedula` FROM `empleado` WHERE `cedula`=$cedula";
                $result = mysqli_query($link, $sql);
                $row = mysqli_fetch_array($result, MYSQLI_NUM);
        
                if(is_null($row)){
                    $sql="INSERT INTO empleado (cedula,nombre,apellido1,"
                            . "apellido2,telefono,eliminar) "
                            . "VALUES ($cedula,'$nombre','$apellido1',"
                            . "'$apellido2','$telefono',0)";
                }else{
                    echo"sii";
                    $sql="UPDATE `empleado` SET `eliminar` = 0"
                            . " WHERE `cedula` = $cedula";
                }
		if ($link->query($sql) === TRUE) {
		    echo "<p>Nuevo registro creado satisfactoriamente</p>";
		    echo"<p><button onclick=location.href='../Lista/lista_empleado.php'>Volver</button></p>";
		} else {
		    echo "Error: " . $sql . "<br>" . $link->error;
		}
	}
        

	 ?>
</body>
</html>