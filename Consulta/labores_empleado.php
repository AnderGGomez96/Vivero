<!DOCTYPE html>
<html>
<head>
	<title>labores de los empleados</title>
</head>
<body>
	<table>
		<tr>
			<td>Codigo empleado:</td>
			<td>nombre empleado:</td>
			<td>Codigo labor:</td>
			<td>Nombre labor:</td>
		</tr>
			<?php
				require('../conexion.php');
				$sql="SELECT empleado.codigo_empleado, empleado.nombre, labores.codigo_labor, labores.nombre FROM (labores_empleados INNER JOIN empleado ON labores_empleados.codigo_empleado = empleado.codigo_empleado) INNER JOIN labores ON labores_empleados.codigo_labor = labores.codigo_labor WHERE (empleado.eliminar =0 AND labores.eliminar=0) AND labores_empleados.eliminar=0";
				$resultado= mysqli_query($link,$sql);
				while($extraido=mysqli_fetch_array($resultado))
				{
					echo "<tr><td>".$extraido['codigo_empleado']."</td>";
					echo "<td>".$extraido[1]."</td>";
					echo "<td>".$extraido['codigo_labor']."</td>";
					echo "<td>".$extraido['nombre']."</td></tr>";
				}
			?>
	</table>
	<p><button onclick=location.href='../index.php'>Pagina anterior</button></p>
</body>
</html>