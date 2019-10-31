<!DOCTYPE html>
<html>
	<head>
		<title>Lista de plantas</title>
	</head>
	<body>


		<div>
			<table border="1">
				<tr align="center"><td><label>Codigo planta</label></td>
					<td><label>Nombre</label></td>
					<td><label>Genero</label></td>
					<td><label>Familia</label></td>
					<td><label>Tipo de planta</label></td>
					<td><label>Cantidad flores</label></td>
					<td><label>Precio venta</label></td>

					<?php

						require('conexion.php');
						$query="SELECT * FROM planta WHERE eliminar = 0 ORDER BY codigo_planta";
						$resultado=mysqli_query($link,$query);

						while ($extraido= mysqli_fetch_array($resultado)) {
							echo "<tr align='center'><td>".$extraido['nombre']."</td>";
							echo "<td>".$extraido['genero']."</td>";
							echo "<td>".$extraido['familia']."</td>";
							echo "<td>".$extraido['tipo_planta']."</td>";
							echo "<td>".$extraido['cantidad_semilla']."</td>";
							echo "<td>".$extraido['cantidad_flor']."</td>";
							echo "<td>".$extraido['precio_venta']."</td></tr>";
						}
					?>
			</table>
			<input type="button" name="insert" value="Insertar" onclick="window.location.href='insertar_alumnos.php'">
			<input type="button" name="delete" value="Eliminar" onclick="window.location.href='borrar_alumnos.php'">
			<input type="button" name="volver" value="Volver" onclick="window.location.href='index.php'">
		</div>
	</body>
</html>