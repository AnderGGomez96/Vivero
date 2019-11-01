<!DOCTYPE html>
<html>
<head>
	<title>Insertar empleados</title>
</head>
<body>
	<?php 
	$codCul=$_POST["codCul"];
        $error = false;
/*Validaciones*/
	if (empty($codCul) || !is_numeric($codCul)) {
		echo "<p>Codigo vacio ó no valido.</p>";
		$error=true;
	}
	if ($error)
	{
		echo"<button onclick=location.href='Eliminar_cultivo.html'>Pagina anterior</button>";
	}else
	{
		require('../conexion.php');

		$sql="UPDATE `cultivo` SET `muerte` = 1 WHERE `codigo_cultivo` = $codCul";

		if ($link->query($sql) === TRUE) {
		    echo "<p>Cultivo eliminado.</p>";
		    echo"<p><button onclick=location.href='../Lista/lista_cultivo.php'>Volver</button></p>";
		} else {
		    echo "Error: " . $sql . "<br>" . $link->error;
		}
	}

	 ?>
</body>
</html>