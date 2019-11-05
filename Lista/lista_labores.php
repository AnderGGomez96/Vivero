<!DOCTYPE html>
<html>
	<head>
            <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,minimum-scale=1.0">
                <link rel="stylesheet" href="../css/bootstrap.min.css">
		<title>Lista de labores activas</title>
	</head>
	<body>

           
		<div>
                            <table align="center" class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="thead-dark" scope="col"><center>CODIGO LABOR</center></th>
                                        <th class="thead-dark" scope="col"><center>NOMBRE</center></th>
                                    </tr>
                                    </thead>
					<?php

						require('../conexion.php');
						$query="SELECT * FROM labores WHERE eliminar = 0 ORDER BY codigo_labor";
						$resultado=mysqli_query($link,$query);

						while ($extraido= mysqli_fetch_array($resultado)) {
							echo "<tr align='center'><td>".$extraido['codigo_labor']."</td>";
							echo "<td>".$extraido['nombre']."</td></tr>";
						}
					?>
			</table>
                   <center> <table align="center">
                        <BR>
                        <tr>
			<input class="btn btn-primary" type="button" name="insert" value="Insertar" onclick="window.location.href='../Insertar/insertar_labor.php'">
			<input class="btn btn-danger" type="button" name="delete" value="Eliminar" onclick="window.location.href='../Eliminar/eliminar_labor.php'">
			<input class="btn btn-success" type="button" name="update" value="Actualizar" onclick="window.location.href='../Actualizar/actualizar_labores.php'">
			<input class="btn btn-info" type="button" name="volver" value="Volver" onclick="window.location.href='../index.php'">
                  </div>
            </tr>
		</table>
                </center>
            </label></center>
            
	</body>
</html>
