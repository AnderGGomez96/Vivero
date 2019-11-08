<!DOCTYPE html>
<html>
	<head>
            <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,minimum-scale=1.0">
                <link rel="stylesheet" href="../css/bootstrap.min.css">
		<title>Lista de cultivos infectados</title>
	</head>
	<body>
                    <table align="center" class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th class="thead-dark" scope="col"><center>Codigo Infeccion</center></th>
                                <th class="thead-dark" scope="col"><center>Codigo Cultivo</center></th>
                                <th class="thead-dark" scope="col"><center>Nombre Enfermedad</center></th>
                            </tr>
                            </thead>
					<?php
						require('../conexion.php');
						$query="SELECT codigo_infeccion, codigo_cultivo, enfermedad.nombre_enfermedad FROM infeccion INNER JOIN enfermedad ON infeccion.codigo_enfermedad = enfermedad.codigo_enfermedad WHERE (infeccion.eliminar=0 AND enfermedad.eliminar=0)";
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
			<input class="btn btn-primary" type="button" name="insert" value="Insertar" onclick="window.location.href='../Insertar/insertar_infeccion.php'">
			<input class="btn btn-danger" type="button" name="delete" value="Eliminar" onclick="window.location.href='../Eliminar/eliminarInfeccion.php'">
			<input class="btn btn-success" type="button" name="update" value="Actualizar" onclick="window.location.href='../Actualizar/actualizar_infeccion.php'">
			<input class="btn btn-info" type="button" name="volver" value="Volver" onclick="window.location.href='../index.php'">
		</div>
            </tr>
		</table>
                </center>
            </label></center>
	</body>
</html>