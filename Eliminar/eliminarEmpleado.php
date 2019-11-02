<!DOCTYPE html>
<html>
<head>
	<title>Eliminar empleado</title>
</head>
<body>
	<?php 
	$codEmpl=$_POST["codEmpl"];
        $error = false;
/*Validaciones*/
	if (empty($codEmpl) || !is_numeric($codEmpl)) {
		echo "<p>Codigo vacio ó no valido.</p>";
		$error=true;
	}
	if ($error)
	{
		echo"<button onclick=location.href='Eliminar_empleado.php'>Pagina anterior</button>";
	}else
	{
		require('../conexion.php');

		$sql="UPDATE `empleado` SET `eliminar` = 1 WHERE `codigo_empleado` = $codEmpl";

		if ($link->query($sql) === TRUE) {
		    echo "<p>Empleado eliminado.</p>";
		    echo"<p><button onclick=location.href='../Lista/lista_empleado.php'>Volver</button></p>";
		} else {
		    echo "Error: " . $sql . "<br>" . $link->error;
		}
	}

	 ?>
</body>
</html>