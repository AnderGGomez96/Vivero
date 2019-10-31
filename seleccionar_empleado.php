<!DOCTYPE html>
<html>
<head>
	<title>Seleccion Empleado</title>
</head>
<body>
	<div>
		<form method="POST" action="borrar_empleado.php">
			<table border="1">
				<tr align="center"><td>X</td>
					<td><label>Codigo</label></td>
					<td><label>Cedula</label></td>
					<td><label>Nombre</label></td>
					<td><label>Primero apellido</label></td>
					<td><label>Segundo apellido</label></td>
					<td><label>Telefono</label></td></tr>
					<?php 
						require('conexion.php');
						$query="SELECT * FROM empleado WHERE eliminar=0 ORDER BY codigo_empleado";
						$resultado= mysqli_query($link,$query);

						while ($extraido=mysqli_fetch_array($resultado)) {
							echo "<tr align='center'> <td><input type='CHECKBOX' name='borrar[]' value='".$extraido['codigo_empleado']."'></td>";
							echo "<td>".$extraido['codigo_empleado']."</td>";
							echo "<td>".$extraido['cedula']."</td>";
							echo "<td>".$extraido['nombre']."</td>";
							echo "<td>".$extraido['apellido1']."</td>";
							echo "<td>".$extraido['apellido2']."</td>";
							echo "<td>".$extraido['telefono']."</td></tr>";
						}
					?>
			</table>
			<input type="submit" name="eliminar" value="Eliminar">
			<input type="button" name="back" value="Volver" onclick="window.location.href='lista_alumnos.php'">
		</form>
	</div>
</body>
</html>