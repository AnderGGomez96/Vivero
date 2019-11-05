<!DOCTYPE html>
<html>
	<head>
            <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,minimum-scale=1.0">
                <link rel="stylesheet" href="../css/bootstrap.min.css">
		<title>Lista de plantas</title>
	</head>
	<body>


		<div>
                     <table align="center" class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="thead-dark" scope="col"><center>CODIGO PLANTA</center></th>
                                        <th class="thead-dark" scope="col"><center>NOMBRE</center></th>
                                        <th class="thead-dark" scope="col"><center>GENERO</center></th>
                                        <th class="thead-dark" scope="col"><center>FAMILIA</center></th>
                                        <th class="thead-dark" scope="col"><center>TIPO DE PLANTA</center></th>
                                        <th class="thead-dark" scope="col"><center>CANTIDAD SEMILA</center></th>
                                        <th class="thead-dark" scope="col"><center>CANTIDAD FLORES</center></th>
                                        <th class="thead-dark" scope="col"><center>PRECIO VENTA</center></th>
                                    </tr>
                                </thead>
					<?php

						require('../conexion.php');
						$query="SELECT * FROM planta WHERE eliminar = 0 ORDER BY codigo_planta";
						$resultado=mysqli_query($link,$query);

						while ($extraido= mysqli_fetch_array($resultado)) {
							echo "<tr align='center'><td>".$extraido['codigo_planta']."</td>";
							echo "<td>".$extraido['nombre']."</td>";
							echo "<td>".$extraido['genero']."</td>";
							echo "<td>".$extraido['familia']."</td>";
							echo "<td>".$extraido['tipo_planta']."</td>";
							echo "<td>".$extraido['cantidad_semilla']."</td>";
							echo "<td>".$extraido['cantidad_flor']."</td>";
							echo "<td>".$extraido['precio_venta']."</td></tr>";
						}
					?>
			</table>
                   <center> <table align="center">
                        <BR>
                        <tr>
			<input class="btn btn-primary" type="button" name="insert" value="Insertar" onclick="window.location.href='../Insertar/insertar_planta.php'">
			<input class="btn btn-danger" type="button" name="delete" value="Eliminar" onclick="window.location.href='../Eliminar/eliminar_planta.php'">
			<input class="btn btn-success" type="button" name="update" value="Actualizar" onclick="window.location.href='../Actualizar/actualizar_planta.php'">
			<input class="btn btn-info" type="button" name="volver" value="Volver" onclick="window.location.href='../index.php'">
		</div>
            </tr>
		</table>
                </center>
            </label></center>
	</body>
</html>
