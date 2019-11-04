<!DOCTYPE html>
<html>
<head>
	<title>Actualizar cultivo</title>
</head>
<body>
	<?php
	if (isset($_POST['submit'])) 
	{
		$codigo_cultivo=$_POST["codigo_cultivo"];
		$codigo_empleado=$_POST["codigo_empleado"];
		$codigo_planta=$_POST["codigo_planta"];
		$cantidad_cultivo=$_POST["cantidad_cultivo"];
		$humedad_cultivo=$_POST["humedad_cultivo"];
		$edad_cultivo=$_POST["edad_cultivo"];
		$dias_abono=$_POST["dias_abono"];
		$crecimiento=$_POST["crecimiento"];
		$muerte=$_POST["muerte"];
		$error=false;
		/*Validaciones*/
		if (empty($codigo_cultivo) )) {
			echo "<p>codigo_cultivo vacio ó no valido.</p>";
			$error=true;
		}
		if (empty($codigo_empleado) || !is_numeric($codigo_empleado)) {
			echo "<p>codigo empleado vacio ó no valido.</p>";
			$error=true;
		}
		if (empty($codigo_planta) || !is_numeric($codigo_planta)) {
			echo "<p>codigo planta vacio ó no valido</p>";
			$error=true;
		}
		if (empty($cantidad_cultivo) || !is_numeric($cantidad_cultivo)) {
			echo "<p>cantidad_cultivo vacio ó no valido</p>";
			$error=true;
		}
		if (empty($humedad_cultivo) || !is_numeric($humedad_cultivo)) {
			echo "<p>humedad cultivo vacio ó no valido</p>";
			$error=true;
		}
		if (empty($dias_abono) || !is_numeric($dias_abono)) {
			echo "<p>dias abono cultivo vacio ó no valido</p>";
			$error=true;
		}
		if (empty($crecimiento) || !is_numeric($crecimiento)) {
			echo "<p>crecimiento cultivo vacio ó no valido</p>";
			$error=true;
		}
		if (empty($muerte)) {
			echo "<p>muerte cultivo vacio ó no valido</p>";
			$error=true;
		}
		if ($error)
		{
			echo"<button onclick=location.href='actualizar_cultivo.php'>Pagina anterior</button>";
		}else
		{
			require('../conexion.php');
			$retorno="SELECT codigo_planta, cantidad_cultivo FROM cultivo WHERE codigo_cultivo=$codigo_cultivo AND muerte = 0";
			$resultado= mysqli_query($link,$retorno);
			$extraido=mysqli_fetch_array($resultado);
			$actualizar_planta="UPDATE planta SET cantidad_semilla = (cantidad_semilla+$extraido[cantidad_cultivo]) WHERE codigo_planta = $extraido[codigo_planta]";
			if ($link->query($actualizar_planta) === TRUE)
		    {
			    $validar="SELECT cantidad_semilla FROM planta WHERE codigo_planta=$codigo_planta";
				$resultado= mysqli_query($link,$validar);
				$extraido=mysqli_fetch_array($resultado);
				if ($cantidad_cultivo > $extraido['cantidad_semilla'])
				{
					echo "<p>La cantidad de unidades de la planta es mayor a la disponible de semillas : $extraido[cantidad_semilla]</p>";
					echo"<p><button onclick=location.href='actualizar_cultivo.php'>Pagina anterior</button></p>";
				}else
				{
					if ($muerte==2) {
						$muerte=0;
					}
					$sql="UPDATE cultivo SET codigo_empleado=$codigo_empleado, codigo_planta=$codigo_planta,cantidad_cultivo=$cantidad_cultivo,humedad_cultivo=$humedad_cultivo,edad_cultivo=$edad_cultivo,dias_abono=$dias_abono, crecimiento=$crecimiento, muerte=$muerte WHERE codigo_cultivo=$codigo_cultivo";
			if ($link->query($actualizar_planta) === TRUE)
		    {
			    $validar="SELECT cantidad_semilla FROM planta WHERE codigo_planta=$codigo_planta";
				$resultado= mysqli_query($link,$validar);
				$extraido=mysqli_fetch_array($resultado);
				if ($cantidad_cultivo > $extraido['cantidad_semilla'])
				{
					echo "<p>La cantidad de unidades de la planta es mayor a la disponible de semillas : $extraido[cantidad_semilla]</p>";
					echo"<p><button onclick=location.href='actualizar_cultivo.php'>Pagina anterior</button></p>";
				}else
				{
					if ($muerte==2) {
						$muerte=0;
					}
					$sql="UPDATE cultivo SET codigo_empleado=$codigo_empleado, codigo_planta=$codigo_planta,cantidad_cultivo=$cantidad_cultivo,humedad_cultivo=$humedad_cultivo,edad_cultivo=$edad_cultivo,dias_abono=$dias_abono, crecimiento=$crecimiento, muerte=$muerte WHERE codigo_cultivo=$codigo_cultivo";
					if ($link->query($sql) === TRUE) {
					    echo "<p>Registro actualizado satisfactoriamente</p>";

					    $nuevo=$extraido['cantidad_semilla']-$cantidad_cultivo;
					    $sql="UPDATE planta SET cantidad_semilla=$nuevo WHERE codigo_planta=$codigo_planta";
					    if ($link->query($sql) === TRUE)
					    {
					    	echo"<p><button onclick=location.href='actualizar_cultivo.php'>Actualice un nuevo cultivo</button></p>";
					    }else {
					    echo "Error: " . $sql . "<br>" . $link->error;
						}
					} else {
					    echo "Error: " . $sql . "<br>" . $link->error;
					}

		    	}
			}else {
		    	echo"<p>Error al actualizar la tabla planta <button onclick=location.href='actualizar_cultivo.php'>Pagina anterior</button></p>";
			}
		}
	}
	else
	{
	?>
	<form method="post" action="actualizar_cultivo.php">
		<table>
			<tr>
				<td>Codigo Cultivo</td>
				<td>
					<select name="codigo_cultivo">
					<?php
						require ('../conexion.php');
						$query= "SELECT * FROM cultivo WHERE termino = 0 ORDER BY codigo_cultivo";
						$resultado= mysqli_query($link,$query);

						while($extraido= mysqli_fetch_array($resultado))
						{
							echo "<option value='$extraido[codigo_cultivo]'>$extraido[codigo_cultivo]</option>";
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
			<tr><td>Codigo planta:</td>
				<td>
					<select name="codigo_planta">
					<?php
						require ('../conexion.php');
						$query= "SELECT * FROM planta WHERE eliminar = 0 ORDER BY codigo_planta";
						$resultado= mysqli_query($link,$query);

						while($extraido= mysqli_fetch_array($resultado))
						{
							echo "<option value='$extraido[codigo_planta]'>$extraido[codigo_planta]</option>";
						}
					?>
					</select>
				</td>
			</tr>
				<tr><td>Cantidad cultivo:</td>
				<td><input type="number" name="cantidad_cultivo"></td>
			</tr>
				<tr><td>Humedad cultivo:</td>
				<td><input type="number" name="humedad_cultivo"></td>
			</tr>
				<tr><td>Edad Cultivo:</td>
				<td><input type="number" name="edad_cultivo"></td>
			</tr>
			<tr><td>Dias abono:</td>
				<td><input type="number" name="dias_abono"></td>
			</tr>
			<tr><td>Crecimiento:</td>
				<td><input type="number" name="crecimiento"></td>
			</tr>
			<tr><td>Muerte:</td>
				<td><select name="muerte">
					<option value=2>0</option>
					<option value=1>1</option>
				</select></td>
			</tr>
		</table>
		<input type="submit" name="submit" value="Actualizar">
	</form>
	<button onclick=location.href='../Lista/lista_cultivo.php'>Lista Cultivo</button>
	<?php
	}
	?>
</body>
</html>