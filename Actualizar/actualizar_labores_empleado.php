<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,minimum-scale=1.0">
                <link rel="stylesheet" href="../css/bootstrap.min.css">
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
			echo "<center><p>codigo_labor_empleado vacio ó no valido.</p></center>";
			$error=true;
		}
		if (empty($codigo_empleado) || !is_numeric($codigo_empleado)) {
			echo "<center><p>codigo empleado vacio ó no valido.</p></center>";
			$error=true;
		}
		if (empty($codigo_labor) || !is_numeric($codigo_labor)) {
			echo "<center><p>codigo_laborvacio ó no valido</p></center>";
			$error=true;
		}
		if ($error)
		{
                    ?>
                    <center><td><input type="button" name="volver" value="Pagina anterior" class="btn btn-success" onclick="window.location.href='actualizar_labores_empleado.php'"></td></center>
                    <?php
                }else
		{
			require('../conexion.php');

			$sql="UPDATE labores_empleados SET codigo_empleado=$codigo_empleado, codigo_labor=$codigo_labor WHERE codigo_labor_empleado=$codigo_labor_empleado";

			if ($link->query($sql) === TRUE) {
			    echo "<center><p>Registro actualizado satisfactoriamente</p>";
                            ?>
                            <center><td><input type="button" name="volver" value="Actualice un nuevo empleado" class="btn btn-success" onclick="window.location.href='actualizar_labores_empleado.php'"></td></center>
			<?php
                        } else {
			    echo "Error: " . $sql . "<br>" . $link->error;
			}
		}
	}
	else
	{
	?>
	<form method="post" action="actualizar_labores_empleado.php">
		<center>
		<table>
			<tr>
				<td>Codigo labor empleado</td>
				<td>
					<select class="form-control" name="codigo_labor_empleado">
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
					<select class="form-control" name="codigo_empleado">
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
					<select class="form-control" name="codigo_labor">
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
		<input class="btn btn-primary" type="submit" name="submit" value="Actualizar">
	</form>
        <center><td><input type="button" name="volver" value="Lista Labores-Empleado" class="btn btn-success" onclick="window.location.href='../Lista/lista_labores_empleado.php'"></td></center>
	<?php
	}
	?>
</body>
</html>