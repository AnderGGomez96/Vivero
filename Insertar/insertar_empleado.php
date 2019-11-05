<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,minimum-scale=1.0">
                <link rel="stylesheet" href="../css/bootstrap.min.css">
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
		echo "<center><p>Cedula vacio ó no valido.</p></center>";
		$error=true;
	}
	if (empty($nombre) || is_numeric($nombre)) {
		echo "<center><p>Nombre vacio ó no valido</p></center>";
		$error=true;
	}
	if (empty($apellido1) || is_numeric($apellido1)) {
		echo "<center><p>Apellido vacio ó no valido</p></center>";
		$error=true;
	}
	if (empty($apellido2) || is_numeric($apellido2)) {
		echo "<center><p>Apellido vacio ó no valido</p></center>";
		$error=true;
	}
	if (empty($telefono) || !is_numeric($telefono)) {
		echo "<center><p>Telefono vacio ó no valido</p></center>";
		$error=true;
	}
	if ($error)
	{
            ?>
                <center><input class="btn btn-primary" onclick=location.href='../HTML/insertar_empleado.html' type="submit" name="Volver" value="Volver" /></p></center>
            <?php
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