<!DOCTYPE html>
<html>
<head>
	<title>Actualizar planta</title>
</head>
<body>
	<?php
	if (isset($_POST['submit'])) 
	{
		$codigo_planta=$_POST["codigo_planta"];
		$nombre=$_POST["nombre"];
		$genero=$_POST["genero"];
		$familia=$_POST["familia"];
		$tipo_planta=$_POST["tipo_planta"];
		$cantidad_semilla=$_POST["cantidad_semilla"];
		$cantidad_flor=$_POST["cantidad_flor"];
		$precio_venta=$_POST["precio_venta"];
		$error=false;
		/*Validaciones*/
		if (empty($nombre) || is_numeric($nombre)) {
			echo "<p>nombre empleado vacio ó no valido.</p>";
			$error=true;
		}
		if (empty($genero) || is_numeric($genero)) {
			echo "<p>genero planta vacio ó no valido</p>";
			$error=true;
		}
		if (empty($familia) || is_numeric($familia)) {
			echo "<p>familia vacio ó no valido</p>";
			$error=true;
		}
		if (empty($tipo_planta) || is_numeric($tipo_planta)) {
			echo "<p>tipo_planta cultivo vacio ó no valido</p>";
			$error=true;
		}
		if (empty($cantidad_semilla) || !is_numeric($cantidad_semilla)) {
			echo "<p>cantidad_semilla abono cultivo vacio ó no valido</p>";
			$error=true;
		}
		if (empty($cantidad_flor) || !is_numeric($cantidad_flor)) {
			echo "<p>cantidad_flor cultivo vacio ó no valido</p>";
			$error=true;
		}
		if (empty($precio_venta) || !is_numeric($precio_venta)) {
			echo "<p>precio_venta cultivo vacio ó no valido</p>";
			$error=true;
		}
		if ($error)
		{
			echo"<button onclick=location.href='actualizar_planta.php'>Pagina anterior</button>";
		}else
		{
			require('../conexion.php');

			$sql="UPDATE planta SET nombre='$nombre', genero='$genero',familia='$familia',tipo_planta='$tipo_planta',cantidad_semilla=$cantidad_semilla,cantidad_flor=$cantidad_flor, precio_venta=$precio_venta WHERE codigo_planta=$codigo_planta";

			if ($link->query($sql) === TRUE) {
			    echo "<p>Registro actualizado satisfactoriamente</p>";
			    echo"<p><button onclick=location.href='actualizar_cultivo.php'>Actualice una nuea planta</button></p>";
			} else {
			    echo "Error: " . $sql . "<br>" . $link->error;
			}
		}
	}
	else
	{
	?>
	<form method="post" action="actualizar_planta.php">
		<table>
			<tr>
				<td>Codigo planta</td>
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
			<tr><td>Nombre:</td>
				<td><input type="name" name="nombre"></td>
			</tr>
			<tr><td>Genero:</td>
				<td><input type="name" name="genero"></td>
			</tr>
				<tr><td>Familia:</td>
				<td><input type="name" name="familia"></td>
			</tr>
				<tr><td>Tipo planta:</td>
				<td><input type="name" name="tipo_planta"></td>
			</tr>
				<tr><td>Cantidad semilla:</td>
				<td><input type="name" name="cantidad_semilla"></td>
			</tr>
			<tr><td>Cantidad flor:</td>
				<td><input type="number" name="cantidad_flor"></td>
			</tr>
			<tr><td>Precio venta:</td>
				<td><input type="number" name="precio_venta"></td>
			</tr>
		</table>
		<input type="submit" name="submit" value="Actualizar">
	</form>
	<button onclick=location.href='../Lista/lista_planta.php'>Lista planta</button>
	<?php
	}
	?>
</body>
</html>