<!DOCTYPE html>
<html>
	<head>
		<title>Lista de ventas Activos</title>
	</head>
	<body>


		<div>
			<table border="1">
				<tr align="center"><td><label>Codigo planta</label></td>
					<td><label>Nombre</label></td>
					<td><label>Codigo Planta</label></td>
					<td><label>Unidades</label></td></tr>

					<?php

						require('../conexion.php');
						$query="SELECT * FROM ventas ORDER BY codigo_ventas";
						$resultado=mysqli_query($link,$query);

						while ($extraido= mysqli_fetch_array($resultado)) {
							echo "<tr align='center'><td>".$extraido['codigo_ventas']."</td>";
							echo "<td>".$extraido['nombre']."</td>";
							echo "<td>".$extraido['codigo_planta']."</td>";
							echo "<td>".$extraido['unidades']."</td></tr>";
						}
					?>
			</table>
			<input type="button" name="insert" value="Insertar" onclick="window.location.href='insertar_alumnos.php'">
			<input type="button" name="delete" value="Eliminar" onclick="window.location.href='borrar_alumnos.php'">
			<input type="button" name="updat" value="Actualizar" onclick="window.location.href='../Actualizar/actualizar_ventas.php'">
			<input type="button" name="volver" value="Volver" onclick="window.location.href='../index.php'">
		</div>
	</body>
</html>