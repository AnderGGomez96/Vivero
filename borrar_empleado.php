<!DOCTYPE html>
<html>
<head>
	<title>Borrar Empleados</title>
</head>
<body>
	<?php
	require('conexion.php');
	$borrar=$_POST['borrar'];
	if (empty($borrar))
	{
		echo "No se selecciono ninguna opcion";
	}else
	{
		$nFilas=count($borrar);
		for ($i=0; $i<$nFilas ; $i++) { 
			$instruccion="UPDATE empleado SET eliminar=1 WHERE codigo_empleado=$borrar[$i]";
	        $consulta=mysqli_query($link,$instruccion) or die("Fallo La Eliminacion");
		}
		mysqli_close ($link);
		echo "<P>[ <A HREF='seleccionar_empleado.php'>Eliminar mas empleados</A> ]</P>";
	}
	?>
</body>
</html>