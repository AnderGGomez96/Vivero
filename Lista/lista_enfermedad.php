<!DOCTYPE html>
<html>
	<head>
		<title>Lista de Enfermedades</title>
	</head>
	<body>


		<div>
			<table border="1">
				<tr align="center"><td><label>Codigo enfermedad</label></td>
					<td><label>Nombre Enfermedad</label></td>
					<td><label>Tratamiento</label></td></tr>

					<?php

						require('../conexion.php');
						$query="SELECT * FROM enfermedad WHERE eliminar = 0 ORDER BY codigo_enfermedad";
						$resultado=mysqli_query($link,$query);

						while ($extraido= mysqli_fetch_array($resultado)) {
							echo "<tr align='center'><td>".$extraido['codigo_enfermedad']."</td>";
							echo "<td>".$extraido['nombre_enfermedad']."</td>";
							echo "<td>".$extraido['tratamiento']."</td></tr>";
						}
					?>
			</table>
			<input type="button" name="insert" value="Insertar" onclick="window.location.href='insertar_alumnos.php'">
			<input type="button" name="delete" value="Eliminar" onclick="window.location.href='borrar_alumnos.php'">
			<input type="button" name="update" value="Actualizar" onclick="window.location.href='../Actualizar/actualizar_enfermedad.php'">
			<input type="button" name="volver" value="Volver" onclick="window.location.href='../index.php'">
		</div>
	</body>
</html>