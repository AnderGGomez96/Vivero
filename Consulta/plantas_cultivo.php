<!DOCTYPE html>
<html>
<head>
	<title>plantas en cultivo</title>
</head>
<body>
	<table>
		<tr>
			<td>Codigo cultivo:</td>
			<td>Codigo planta:</td>
			<td>Nombre planta:</td>
			<td>Cantidad cultivo:</td>
		</tr>
			<?php
				require('../conexion.php');
				$sql="SELECT codigo_cultivo, cultivo.codigo_planta, nombre, cantidad_cultivo FROM cultivo INNER JOIN planta ON cultivo.codigo_planta = planta.codigo_planta WHERE (muerte = 0 AND termino = 0)";
				$resultado= mysqli_query($link,$sql);
				while($extraido=mysqli_fetch_array($resultado))
				{
					echo "<tr><td>".$extraido['codigo_cultivo']."</td>";
					echo "<td>".$extraido['codigo_planta']."</td>";
					echo "<td>".$extraido['nombre']."</td>";
					echo "<td>".$extraido['cantidad_cultivo']."</td></tr>";
				}
			?>
	</table>
	<p><button onclick=location.href='../index.php'>Pagina anterior</button></p>
</body>
</html>