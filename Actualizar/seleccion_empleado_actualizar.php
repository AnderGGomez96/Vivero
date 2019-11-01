<!DOCTYPE html>
<html>
<head>
	<title>Actualizar empleado</title>
</head>
<body>
	Actualice un empleado.
	<form method="POST" action="actualizar_empleado.php">
		<table>
		<tr>
			<td>Codigo empleado: </td>
			<td><select name="codigo_empleado">
			<?php
				require ('../conexion.php');
				$query= "SELECT * FROM empleado ORDER BY codigo_empleado";
				$resultado= mysqli_query($link,$query);

				while($extraido= mysqli_fetch_array($resultado))
				{
					echo "<option value='$extraido[codigo_empleado]'>$extraido[codigo_empleado]</option>";
				}
			?>
			</select></td>
		</tr>
		</table>
		<input type="submit" name="submit" value="Actualizar Informacion">
	</form>
	
</body>
</html>