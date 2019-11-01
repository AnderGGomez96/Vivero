<!DOCTYPE html>
<html>
<head>
	<title>Actualizar enfermedad</title>
</head>
<body>
	<?php
	if (isset($_POST['submit'])) 
	{
		$codigo_enfermedad=$_POST["codigo_enfermedad"];
		$nombre_enfermedad=$_POST["nombre_enfermedad"];
		$tratamiento=$_POST["tratamiento"];
		$error=false;
		/*Validaciones*/
		if (empty($nombre_enfermedad) || is_numeric($nombre_enfermedad)) {
			echo "<p>codigo empleado vacio ó no valido.</p>";
			$error=true;
		}
		if (empty($tratamiento) || is_numeric($tratamiento)) {
			echo "<p>cnombre_enfermedad vacio ó no valido</p>";
			$error=true;
		}
		if ($error)
		{
			echo"<button onclick=location.href='actualizar_enfermedad.php'>Pagina anterior</button>";
		}else
		{
			require('../conexion.php');

			$sql="UPDATE enfermedad SET nombre_enfermedad='$nombre_enfermedad', tratamiento='$tratamiento' WHERE codigo_enfermedad=$codigo_enfermedad";

			if ($link->query($sql) === TRUE) {
			    echo "<p>Registro actualizado satisfactoriamente</p>";
			    echo"<p><button onclick=location.href='actualizar_enfermedad.php'>Actualice una nueva enfermedad</button></p>";
			} else {
			    echo "Error: " . $sql . "<br>" . $link->error;
			}
		}
	}
	else
	{
	?>
	<form method="post" action="actualizar_enfermedad.php">
		<table>
			<tr>
				<td>Codigo enfermedad</td>
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
			<tr><td>Nombre enfermedad:</td>
				<td>
					<input type="name" name="nombre_enfermedad">
				</td>
			</tr>
			<tr><td>tratamiento:</td>
				<td>
					<input type="text" name="tratamiento">
				</td>
			</tr>
		</table>
		<input type="submit" name="submit" value="Actualizar">
	</form>
	<button onclick=location.href='../Lista/lista_enfermedad.php'>Lista enfermedad</button>
	<?php
	}
	?>
</body>
</html>