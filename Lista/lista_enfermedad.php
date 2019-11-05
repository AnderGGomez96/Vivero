<!DOCTYPE html>
<html>
	<head>
            <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,minimum-scale=1.0">
                <link rel="stylesheet" href="../css/bootstrap.min.css">
		<title>Lista de Enfermedades</title>
	</head>
	<body>


		<div>
                            <table align="center" class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="thead-dark" scope="col"><center>Codigo Enfermedad</center></th>
                                        <th class="thead-dark" scope="col"><center>Nombre Enfermedad</center></th>
                                        <th class="thead-dark" scope="col"><center>Tratamiento</center></th>

                                    </tr>
                                    </thead>
					<?php

						require('../conexion.php');
						$query="SELECT * FROM enfermedad WHERE eliminar = 0 ORDER BY codigo_enfermedad";
						$resultado=mysqli_query($link,$query);

						while ($extraido= mysqli_fetch_array($resultado)) {
							echo "<tr align='center'><td>".$extraido['codigo_enfermedad']."</td>";
							echo "<td>".$extraido['nombre_enfermedad']."</td>";
							echo "<td>".$extraido['tratamiento']."</td></tr>";
						}
					?>
			</table>
            <center> <table align="center">
		<BR>
		<tr>
			<input class="btn btn-primary" type="button" name="insert" value="Insertar" onclick="window.location.href='../HTML/insertar_enfermedad.html'">
			<input class="btn btn-danger" type="button" name="delete" value="Eliminar" onclick="window.location.href='../Eliminar/eliminar_enfermedad.php'">
			<input class="btn btn-success" type="button" name="update" value="Actualizar" onclick="window.location.href='../Actualizar/actualizar_enfermedad.php'">
			<input class="btn btn-info" type="button" name="volver" value="Volver" onclick="window.location.href='../index.php'">
               </tr>
		</table>
                </center>
		</div>
	</body>
</html>
