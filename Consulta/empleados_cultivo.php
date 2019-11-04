<!DOCTYPE html>
<html>
<head>
	<title>Empleados con cultivo</title>
</head>
<body>
	<table>
		<tr>
			<td>Codigo cultivo:</td>
			<td>Codigo empleado:</td>
			<td>Nombre empleado:</td>
		</tr>
			<?php
				require('../conexion.php');
				$sql="SELECT codigo_cultivo, cultivo.codigo_empleado, nombre FROM cultivo INNER JOIN empleado ON cultivo.codigo_empleado = empleado.codigo_empleado WHERE (muerte = 0 AND termino = 0)";
				$resultado= mysqli_query($link,$sql);
				while($extraido=mysqli_fetch_array($resultado))
				{
					echo "<tr><td>".$extraido['codigo_cultivo']."</td>";
					echo "<td>".$extraido['codigo_empleado']."</td>";
					echo "<td>".$extraido['nombre']."</td></tr>";
				}
			?>
	</table>
	<p><button onclick=location.href='../index.php'>Pagina anterior</button></p>
</body>
</html>