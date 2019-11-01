<!DOCTYPE html>
<html>
	<head>
		<title>Lista de Cultivos Activos</title>
	</head>
	<body>


		<div>
			<table border="1">
				<tr align="center"><td><label>Codigo cultivo</label></td>
					<td><label>Codigo Empleado</label></td>
					<td><label>Codigo Planta</label></td>
					<td><label>Cantidad Cultivo</label></td>
					<td><label>Humedad Cultivo</label></td>
					<td><label>Edad Cultivo</label></td>
					<td><label>Dias abono</label></td>
					<td><label>Crecimiento</label></td></tr>

					<?php

						require('../conexion.php');
						$query="SELECT * FROM cultivo WHERE muerte = 0 ORDER BY codigo_cultivo";
						$resultado=mysqli_query($link,$query);

						while ($extraido= mysqli_fetch_array($resultado)) {
							echo "<tr align='center'><td>".$extraido['codigo_cultivo']."</td>";
							echo "<td>".$extraido['codigo_empleado']."</td>";
							echo "<td>".$extraido['codigo_planta']."</td>";
							echo "<td>".$extraido['cantidad_cultivo']."</td>";
							echo "<td>".$extraido['humedad_cultivo']."</td>";
							echo "<td>".$extraido['edad_cultivo']."</td>";
							echo "<td>".$extraido['dias_abono']."</td>";
							echo "<td>".$extraido['crecimiento']."</td></tr>";
						}
					?>
			</table>
			<input type="button" name="insert" value="Insertar" onclick="window.location.href='../Insertar/insertar_alumnos.php'">
			<input type="button" name="delete" value="Eliminar" onclick="window.location.href='../HTML/Eliminar_cultivo.html'">
			<input type="button" name="delete" value="Actualizar" onclick="window.location.href='../Actualizar/actualizar_cultivo.php'">
			<input type="button" name="volver" value="Volver" onclick="window.location.href='../index.php'">
		</div>
	</body>
</html>