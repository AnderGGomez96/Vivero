<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,minimum-scale=1.0">
                <link rel="stylesheet" href="../css/bootstrap.min.css">
	<title>Actualizar labor</title>
</head>
<body>
	<?php
	if (isset($_POST['submit'])) 
	{
		$codigo_labor=$_POST["codigo_labor"];
		$nombre=$_POST["nombre"];
		$error=false;
		/*Validaciones*/
		if (empty($codigo_labor)) {
			echo "<p>codigo_labor vacio ó no valido.</p>";
			$error=true;
		}
		if (empty($nombre) || is_numeric($nombre)) {
			echo "<p>nombre vacio ó no valido.</p>";
			$error=true;
		}
		
		if ($error)
		{
			echo"<button onclick=location.href='actualizar_labores.php'>Pagina anterior</button>";
		}else
		{
			require('../conexion.php');

			$sql="UPDATE labores SET nombre='$nombre' WHERE codigo_labor=$codigo_labor";

			if ($link->query($sql) === TRUE) {
			    echo "<p>Registro actualizado satisfactoriamente</p>";
			    echo"<p><button onclick=location.href='actualizar_labores.php'>Actualice una nueva labor</button></p>";
			} else {
			    echo "Error: " . $sql . "<br>" . $link->error;
			}
		}
	}
	else
	{
	?>
	<form method="post" action="actualizar_labores.php">
		<table>
			<tr>
				<td>Codigo labor</td>
				<td>
					<select name="codigo_labor">
					<?php
						require ('../conexion.php');
						$query= "SELECT * FROM labores WHERE eliminar = 0 ORDER BY codigo_labor";
						$resultado= mysqli_query($link,$query);

						while($extraido= mysqli_fetch_array($resultado))
						{
							echo "<option value='$extraido[codigo_labor]'>$extraido[codigo_labor]</option>";
						}
					?>
					</select>
				</td>
			</tr>
			<tr><td>Nombre</td>
				<td><input type="name" name="nombre"></td>
			</tr>
		</table>
		<input type="submit" name="submit" value="Actualizar">
	</form>
	<button onclick=location.href='../Lista/lista_labores.php'>Lista Labores</button>
	<?php
	}
	?>
</body>
</html>