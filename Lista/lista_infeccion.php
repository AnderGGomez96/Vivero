<!DOCTYPE html>
<html>
	<head>
		<title>Lista de cultivos infectados</title>
	</head>
	<body>


		<div>
			<table border="1">
				<tr align="center"><td><label>Codigo infeccion</label></td>
					<td><label>Codigo cultivo</label></td>
					<td><label>Codigo enfermedad</label></td></tr>

					<?php

						require('../conexion.php');
						//$query="SELECT * FROM infeccion WHERE eliminar = 0 ORDER BY codigo_infeccion";
						$query="SELECT * FROM infeccion WHERE codigo_cultivo IN (SELECT codigo_cultivo FROM cultivo WHERE muerte = 0) ORDER BY codigo_cultivo";
						$resultado=mysqli_query($link,$query);

						while ($extraido= mysqli_fetch_array($resultado)) {
							echo "<tr align='center'><td>".$extraido['codigo_infeccion']."</td>";
							echo "<td>".$extraido['codigo_cultivo']."</td>";
							echo "<td>".$extraido['codigo_enfermedad']."</td></tr>";
						}
					?>
			</table>
			<input type="button" name="insert" value="Insertar" onclick="window.location.href='insertar_alumnos.php'">
			<input type="button" name="delete" value="Eliminar" onclick="window.location.href='borrar_alumnos.php'">

			<input type="button" name="update" value="Actualizar" onclick="window.location.href='../Actualizar/actualizar_infeccion.php'">
 
			<input type="button" name="volver" value="Volver" onclick="window.location.href='../index.php'">
		</div>
	</body>
</html>
