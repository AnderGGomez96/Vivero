<!DOCTYPE html>
<html>
<head>
	<title>Actualizar Venta</title>
</head>
<body>
	<?php
	if (isset($_POST['submit'])) 
	{
		$codigo_ventas=$_POST["codigo_ventas"];
		$nombre=$_POST["nombre"];
		$codigo_planta=$_POST["codigo_planta"];
		$unidades=$_POST["unidades"];
		$error=false;
		/*Validaciones*/
		if (empty($codigo_ventas)) {
			echo "<p>codigo_ventas cliente vacio ó no valido.</p>";
			$error=true;
		}
		if (empty($nombre) || is_numeric($nombre)) {
			echo "<p>nombre cliente vacio ó no valido.</p>";
			$error=true;
		}
		if (empty($codigo_planta) || !is_numeric($codigo_planta)) {
			echo "<p>codigo planta vacio ó no valido</p>";
			$error=true;
		}
		if (empty($unidades) || !is_numeric($unidades)) {
			echo "<p>unidades vacio ó no valido</p>";
			$error=true;
		}
		if ($error)
		{
			echo"<button onclick=location.href='actualizar_ventas.php'>Pagina anterior</button>";
		}else
		{
			require('../conexion.php');

			$validar="SELECT cantidad_flor FROM planta WHERE codigo_planta=$codigo_planta";
			$resultado= mysqli_query($link,$validar);
			$extraido=mysqli_fetch_array($resultado);
			if ($unidades >$extraido['cantidad_flor']) {
				echo "<p>La cantidad de unidades de la planta es mayor a la disponible : $extraido[cantidad_flor]</p>";
				echo"<p><button onclick=location.href='actualizar_ventas.php'>Pagina anterior</button></p>";
			}else
			{
				$sql="UPDATE ventas SET nombre='$nombre', codigo_planta=$codigo_planta,unidades=$unidades WHERE codigo_ventas=$codigo_ventas";


				if ($link->query($sql) === TRUE) {
				    echo "<p>Registro actualizado satisfactoriamente</p>";
				    $nuevo=$extraido['cantidad_flor']-$unidades;
				    $sql="UPDATE planta SET cantidad_flor=$nuevo WHERE codigo_planta=$codigo_planta";
				    if ($link->query($sql) === TRUE)
				    {
				    	echo"<p><button onclick=location.href='actualizar_ventas.php'>Actualice una nueva venta</button></p>";
				    }else {
				    echo "Error: " . $sql . "<br>" . $link->error;
				}
				    
				} else {
				    echo "Error: " . $sql . "<br>" . $link->error;
				}
			}
		}
	}
	else
	{
	?>
	<form method="post" action="actualizar_ventas.php">
		<table>
			<tr>
				<td>Codigo venta</td>
				<td>
					<select name="codigo_ventas">
					<?php
						require ('../conexion.php');
						$query= "SELECT * FROM ventas ORDER BY codigo_ventas";
						$resultado= mysqli_query($link,$query);

						while($extraido= mysqli_fetch_array($resultado))
						{
							echo "<option value='$extraido[codigo_ventas]'>$extraido[codigo_ventas]</option>";
						}
					?>
					</select>
				</td>
			</tr>
			<tr><td>Nombre cliente:</td>
				<td><input type="name" name="nombre"></td>
			</tr>
				<tr><td>codigo_planta:</td>
				<td>
					<select name="codigo_planta">
					<?php
						require ('../conexion.php');
						$query= "SELECT * FROM planta WHERE eliminar=0 ORDER BY codigo_planta";
						$resultado= mysqli_query($link,$query);

						while($extraido= mysqli_fetch_array($resultado))
						{
							echo "<option value='$extraido[codigo_planta]'>$extraido[codigo_planta]</option>";
						}
					?>
					</select>
				</td>
			</tr>
				<tr><td>Unidades:</td>
				<td><input type="number" name="unidades"></td>
			</tr>
		</table>
		<input type="submit" name="submit" value="Actualizar">
	</form>
	<button onclick=location.href='../Lista/lista_ventas.php'>Lista Cultivo</button>
	<?php
	}
	?>
</body>
</html>