<!DOCTYPE html>
<html>
	<head>
            <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,minimum-scale=1.0">
                <link rel="stylesheet" href="../css/bootstrap.min.css">
		<title>Lista de Cultivos Activos</title>
	</head>
	<body>


		<div>
                    <table align="center" class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="thead-dark" scope="col"><center>CODIGO LABOR EMPLEADO</center></th>
                                        <th class="thead-dark" scope="col"><center>Nombre EMPLEADO</center></th>
                                        <th class="thead-dark" scope="col"><center>Nombre LABOR</center></th>
                                    </tr>
                                    </thead>

					<?php
						require('../conexion.php');
						//$query="SELECT * FROM labores_empleados WHERE eliminar = 0 ORDER BY codigo_labor_empleado";
						$query="SELECT codigo_labor_empleado,empleado.nombre,labores.nombre FROM labores_empleados INNER JOIN empleado ON labores_empleados.codigo_empleado=empleado.codigo_empleado INNER JOIN labores ON labores_empleados.codigo_labor=labores.codigo_labor WHERE (empleado.eliminar=0 AND labores.eliminar=0)";
						$resultado=mysqli_query($link,$query);
						while ($extraido= mysqli_fetch_array($resultado)) {
							echo "<tr align='center'><td>".$extraido[0]."</td>";
							echo "<td>".$extraido[1]."</td>";
							echo "<td>".$extraido[2]."</td></tr>";
						}
					?>
			</table>
                    <center> <table align="center">
                        <BR>
                        <tr>
			<input class="btn btn-primary" type="button" name="insert" value="Insertar" onclick="window.location.href='../Insertar/insertar_labores_empleado.php'">
			<input class="btn btn-danger" type="button" name="delete" value="Eliminar" onclick="window.location.href='../Eliminar/eliminar_labores_empleado.php'">
			<input class="btn btn-success" type="button" name="update" value="Actualizar" onclick="window.location.href='../Actualizar/actualizar_labores_empleado.php'">
			<input class="btn btn-info" type="button" name="volver" value="Volver" onclick="window.location.href='../index.php'">
		</div>
            </tr>
		</table>
                </center>
            </label></center>
	</body>
</html>