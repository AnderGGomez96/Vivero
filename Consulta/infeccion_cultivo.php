<!DOCTYPE html>
<html>
<head>
	<title>plantas en cultivo</title>
</head>
<body>
	<table>
		<tr>
			<td>Codigo infeccion:</td>
			<td>Codigo cultivo:</td>
			<td>Nombre planta</td>
			<td>Codigo enfermedad:</td>
			<td>Nombre enfermedd:</td>
			<td>Tratamiento:</td>
		</tr>
			<?php
				require('../conexion.php');
				$sql="SELECT codigo_infeccion, infeccion.codigo_cultivo,planta.nombre,infeccion.codigo_enfermedad,nombre_enfermedad,tratamiento FROM infeccion INNER JOIN cultivo ON infeccion.codigo_cultivo = cultivo.codigo_cultivo INNER JOIN enfermedad ON infeccion.codigo_enfermedad=enfermedad.codigo_enfermedad INNER JOIN planta ON cultivo.codigo_planta = planta.codigo_planta WHERE (muerte = 0 AND termino = 0) AND infeccion.eliminar=0 AND enfermedad.eliminar=0 AND planta.eliminar=0";
				$resultado= mysqli_query($link,$sql);
				while($extraido=mysqli_fetch_array($resultado))
				{
					echo "<tr><td>".$extraido['codigo_infeccion']."</td>";
					echo "<td>".$extraido['codigo_cultivo']."</td>";
					echo "<td>".$extraido['nombre']."</td>";
					echo "<td>".$extraido['codigo_enfermedad']."</td>";
					echo "<td>".$extraido['nombre_enfermedad']."</td>";
					echo "<td>".$extraido['tratamiento']."</td></tr>";
				}
			?>
	</table>
	<p><button onclick=location.href='../index.php'>Pagina anterior</button></p>
</body>
</html>