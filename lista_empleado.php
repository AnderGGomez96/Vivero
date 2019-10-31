<!DOCTYPE html>
<html>
	<head>
		<title>Lista de empleados</title>
	</head>
	<body>


		<div>
			<table border="1">
				<tr align="center"><td><label>Codigo</label></td>
					<td><label>Cedula</label></td>
					<td><label>Nombre</label></td>
					<td><label>Primero apellido</label></td>
					<td><label>Segundo apellido</label></td>
					<td><label>Telefono</label></td></tr>

					<?php

						require('conexion.php');
						$query="SELECT * FROM empleado WHERE eliminar = 0 ORDER BY codigo_empleado";
						$resultado=mysqli_query($link,$query);

						while ($extraido= mysqli_fetch_array($resultado)) {
							echo "<tr align='center'><td>".$extraido['codigo_empleado']."</td>";
							echo "<td>".$extraido['cedula']."</td>";
							echo "<td>".$extraido['nombre']."</td>";
							echo "<td>".$extraido['apellido1']."</td>";
							echo "<td>".$extraido['apellido2']."</td>";
							echo "<td>".$extraido['telefono']."</td></tr>";
						}
					?>
			</table>
			<input type="button" name="insert" value="Insertar" onclick="window.location.href='insertar_empleado.html'">
			<input type="button" name="delete" value="Eliminar" onclick="window.location.href='seleccionar_empleado.php'">
			<input type="button" name="update" value="Actualizar" onclick="window.location.href='actualizar_empleado.php'">
			<input type="button" name="volver" value="Volver" onclick="window.location.href='index.php'">
		</div>
	</body>
</html>