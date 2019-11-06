<!DOCTYPE html>
<html>
	<head>
                <title>Lista de Cultivos Activos</title>
                <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,minimum-scale=1.0">
                <link rel="stylesheet" href="../css/bootstrap.min.css">
	</head>
	<body>


		<div>
                    <table align="center" class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th class="thead-dark" scope="col"><center>Codigo cultivo</center></th>
                                <th class="thead-dark" scope="col"><center>Codigo Empleado</center></th>
                                <th class="thead-dark" scope="col"><center>Codigo Planta</center></th>
                                <th class="thead-dark" scope="col"><center>Cantidad Cultivo</center></th>
                                <th class="thead-dark" scope="col"><center>Humedad Cultivo</center></th>
                                <th class="thead-dark" scope="col"><center>Edad Cultivo</center></th>
                                <th class="thead-dark" scope="col"><center>Dias abono</center></th>
                                <th class="thead-dark" scope="col"><center>Crecimiento</center></th>
                            </tr>
                            </thead>
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
							echo "<td>".$extraido['crecimiento']."</td>";
						}
					?>
			</table>
                    <center> <table align="center">
				<BR>
				<tr>
                                        <input type="button" name="insert" value=" Insertar " class="btn btn-primary" onclick="window.location.href='../HTML/insertar_cultivo.html'">
                                        <input type="button" name="delete" value=" Eliminar " class="btn btn-danger" onclick="window.location.href='../Eliminar/eliminarCultivo_Select.php'">
                                        <input type="button" name="delete" value=" Actualizar " class="btn btn-success" onclick="window.location.href='../Actualizar/actualizar_cultivo.php'">
                                        <input type="button" name="volver" value=" Volver " class="btn btn-info" onclick="window.location.href='../index.php'">
				</tr>
			</table>
			</center>
		</div>
	</body>
</html>
