<!DOCTYPE html>
<html>
<head>
	<title>Actualizar labores empleado</title>
</head>
<body>
	<?php
	if (isset($_POST['submit'])) 
	{
		$codigo_labor_empleado=$_POST["codigo_labor_empleado"];
		$codigo_empleado=$_POST["codigo_empleado"];
		$codigo_labor=$_POST["codigo_labor"];
		$error=false;
		/*Validaciones*/
		if (empty($codigo_labor_empleado)) {
			echo "<p>codigo_labor_empleado vacio ó no valido.</p>";
			$error=true;
		}
		if (empty($codigo_empleado) || !is_numeric($codigo_empleado)) {
			echo "<p>codigo empleado vacio ó no valido.</p>";
			$error=true;
		}
		if (empty($codigo_labor) || !is_numeric($codigo_labor)) {
			echo "<p>codigo_laborvacio ó no valido</p>";
			$error=true;
		}
		if ($error)
		{
			echo"<button onclick=location.href='actualizar_labores_empleado.php'>Pagina anterior</button>";
		}else
		{
			require('../conexion.php');

			$sql="UPDATE labores_empleados SET codigo_empleado=$codigo_empleado, codigo_labor=$codigo_labor WHERE codigo_labor_empleado=$codigo_labor_empleado";

			if ($link->query($sql) === TRUE) {
			    echo "<p>Registro actualizado satisfactoriamente</p>";
			    echo"<p><button onclick=location.href='actualizar_labores_empleado.php'>Actualice un nuevo empleado</button></p>";
			} else {
			    echo "Error: " . $sql . "<br>" . $link->error;
			}
		}
	}
	else
	{
	?>
	<form method="post" action="actualizar_labores_empleado.php">
		<table>
			<tr>
				<td>Codigo labor empleado</td>
				<td>
					<select name="codigo_labor_empleado">
					<?php
						require ('../conexion.php');
						$query= "SELECT * FROM labores_empleados WHERE eliminar = 0 ORDER BY codigo_labor_empleado";
						$resultado= mysqli_query($link,$query);

						while($extraido= mysqli_fetch_array($resultado))
						{
							echo "<option value='$extraido[codigo_labor_empleado]'>$extraido[codigo_labor_empleado]</option>";
						}
					?>
					</select>
				</td>
			</tr>
			<tr><td>Codigo empleado:</td>
				<td>
					<select name="codigo_empleado">
					<?php
						require ('../conexion.php');
						$query= "SELECT * FROM empleado WHERE eliminar = 0 ORDER BY codigo_empleado";
						$resultado= mysqli_query($link,$query);

						while($extraido= mysqli_fetch_array($resultado))
						{
							echo "<option value='$extraido[codigo_empleado]'>$extraido[codigo_empleado]</option>";
						}
					?>
					</select>
				</td>
			</tr>
			<tr><td>Codigo labor:</td>
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
		</table>
		<input type="submit" name="submit" value="Actualizar">
	</form>
	<button onclick=location.href='../Lista/lista_labores_empleado.php'>Lista Labores-Empleado</button>
	<?php
	}
	?>
</body>
</html>