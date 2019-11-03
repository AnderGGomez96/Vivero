<!DOCTYPE html>
<html>
<head>
	<title>Actualizar infeccion</title>
</head>
<body>
	<?php
	if (isset($_POST['submit'])) 
	{
		$codigo_infeccion=$_POST["codigo_infeccion"];
		$codigo_cultivo=$_POST["codigo_cultivo"];
		$codigo_enfermedad=$_POST["codigo_enfermedad"];
		$error=false;
		/*Validaciones*/
		if (empty($codigo_infeccion)) {
			echo "<p>codigo_infeccion vacio ó no valido.</p>";
			$error=true;
		}
		if (empty($codigo_cultivo) || !is_numeric($codigo_cultivo)) {
			echo "<p>codigo_cultivo vacio ó no valido.</p>";
			$error=true;
		}
		if (empty($codigo_enfermedad) || !is_numeric($codigo_enfermedad)) {
			echo "<p>codigo_enfermedad vacio ó no valido</p>";
			$error=true;
		}
		if ($error)
		{
			echo"<button onclick=location.href='actualizar_infeccion.php'>Pagina anterior</button>";
		}else
		{
			require('../conexion.php');

			$sql="UPDATE infeccion SET codigo_cultivo=$codigo_cultivo, codigo_enfermedad=$codigo_enfermedad WHERE codigo_infeccion=$codigo_infeccion";

			if ($link->query($sql) === TRUE) {
			    echo "<p>Registro actualizado satisfactoriamente</p>";
			    echo"<p><button onclick=location.href='actualizar_infeccion.php'>Actualice una nueva infeccion</button></p>";
			} else {
			    echo "Error: " . $sql . "<br>" . $link->error;
			}
		}
	}
	else
	{
	?>
	<form method="post" action="actualizar_infeccion.php">
		<table>
			<tr>
				<td>Codigo Cultivo</td>
				<td>
					<select name="codigo_infeccion">
					<?php
						require ('../conexion.php');
						$query= "SELECT * FROM infeccion WHERE eliminar = 0 ORDER BY codigo_infeccion";
						$resultado= mysqli_query($link,$query);

						while($extraido= mysqli_fetch_array($resultado))
						{
							echo "<option value='$extraido[codigo_infeccion]'>$extraido[codigo_infeccion]</option>";
						}
					?>
					</select>
				</td>
			</tr>
			<tr><td>Codigo cultivo:</td>
				<td>
					<select name="codigo_cultivo">
					<?php
						require ('../conexion.php');
						$query= "SELECT * FROM cultivo WHERE termino = 0 ORDER BY codigo_cultivo";
						$resultado= mysqli_query($link,$query);

						while($extraido= mysqli_fetch_array($resultado))
						{
						}
					?>
				</td>
			</tr>
							echo "<option value='$extraido[codigo_cultivo]'>$extraido[codigo_cultivo]</option>";
						</select>
		<tr><td>Codigo enfermedad:</td>
				<td>
					<select name="codigo_enfermedad">
					<?php
						require ('../conexion.php');
						$query= "SELECT * FROM enfermedad WHERE eliminar = 0 ORDER BY codigo_enfermedad";
						$resultado= mysqli_query($link,$query);

						while($extraido= mysqli_fetch_array($resultado))
						{
							echo "<option value='$extraido[codigo_enfermedad]'>$extraido[codigo_enfermedad]</option>";
						}
					?>
					</select>
				</td>
			</tr>
		</table>
		<input type="submit" name="submit" value="Actualizar">
	</form>
	<button onclick=location.href='../Lista/lista_infeccion.php'>Lista infeccion</button>
	<?php
	}
	?>
</body>
</html>