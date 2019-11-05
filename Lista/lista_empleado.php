<!DOCTYPE html>
<html>
	<head>
            <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,minimum-scale=1.0">
                <link rel="stylesheet" href="../css/bootstrap.min.css">
		<title>Lista de empleados</title>
	</head>
	<body>

                    <table align="center" class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th class="thead-dark" scope="col"><center>Codigo</center></th>
                                <th class="thead-dark" scope="col"><center>Cedula</center></th>
                                <th class="thead-dark" scope="col"><center>Nombre</center></th>
                                <th class="thead-dark" scope="col"><center>Primer Apellido</center></th>
                                <th class="thead-dark" scope="col"><center>Segundo Apellido</center></th>
                                <th class="thead-dark" scope="col"><center>Telefono</center></th>
                            </tr>
                            </thead>
					<?php

						require('../conexion.php');
						$query="SELECT * FROM empleado WHERE eliminar = 0 ORDER BY codigo_empleado";
						$resultado=mysqli_query($link,$query);

						while ($extraido= mysqli_fetch_array($resultado)) {
							echo "<tr align='center'><td>".$extraido['codigo_empleado']."</td>";
							echo "<td>".$extraido['cedula']."</td>";
							echo "<td>".$extraido['nombre']."</td>";
							echo "<td>".$extraido['apellido1']."</td>";
							echo "<td>".$extraido['apellido2']."</td>";
							echo "<td>".$extraido['telefono']."</td></tr>";
						}
					?>
            </table>
            <center> <table align="center">
		<BR>
		<tr>
			<input class="btn btn-primary" type="button" name="insert" value="Insertar" onclick="window.location.href='../HTML/insertar_empleado.html'">
			<input class="btn btn-danger" type="button" name="delete" value="Eliminar" onclick="window.location.href='../Eliminar/Eliminar_empleado.php'">
			<input class="btn btn-success" type="button" name="update" value="Actualizar" onclick="window.location.href='../Actualizar/actualizar_empleado.php'">
			<input class="btn btn-info" type="button" name="volver" value="Volver" onclick="window.location.href='../index.php'">
		</tr>
		</table>
                </center>
		</div>
	</body>
</html>
