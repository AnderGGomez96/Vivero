<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,minimum-scale=1.0">
                <link rel="stylesheet" href="../css/bootstrap.min.css">
	<title>plantas en cultivo</title>
</head>
<body>
    <div>
                    <table align="center" class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th class="thead-dark" scope="col"><center>CODIGO INFECCION</center></th>
                                <th class="thead-dark" scope="col"><center>CODIGO CULTIVO</center></th>
                                <th class="thead-dark" scope="col"><center>NOMBRE PLANTA</center></th>
                                <th class="thead-dark" scope="col"><center>CODIGO ENFERMEDAD</center></th>
                                <th class="thead-dark" scope="col"><center>NOMBRE ENFERMEDAD</center></th>
                                <th class="thead-dark" scope="col"><center>TRATAMIENTO</center></th>
                            </tr>
                            </thead>

			<?php
				require('../conexion.php');
				$sql="SELECT codigo_infeccion, infeccion.codigo_cultivo,planta.nombre,infeccion.codigo_enfermedad,nombre_enfermedad,tratamiento FROM infeccion INNER JOIN cultivo ON infeccion.codigo_cultivo = cultivo.codigo_cultivo INNER JOIN enfermedad ON infeccion.codigo_enfermedad=enfermedad.codigo_enfermedad INNER JOIN planta ON cultivo.codigo_planta = planta.codigo_planta WHERE (muerte = 0 AND termino = 0) AND infeccion.eliminar=0 AND enfermedad.eliminar=0 AND planta.eliminar=0";
				$resultado= mysqli_query($link,$sql);
				while($extraido=mysqli_fetch_array($resultado))
				{
					echo "<tr align='center'><td>".$extraido['codigo_infeccion']."</td>";
					echo "<td>".$extraido['codigo_cultivo']."</td>";
					echo "<td>".$extraido['nombre']."</td>";
					echo "<td>".$extraido['codigo_enfermedad']."</td>";
					echo "<td>".$extraido['nombre_enfermedad']."</td>";
					echo "<td>".$extraido['tratamiento']."</td></tr>";
				}
			?>
	</table>
                <center> <table align="center">
                <BR>
                <tr>
                    <p><button class="btn btn-info" onclick=location.href='../index.php'>Pagina anterior</button></p>
                </tr>
                </table>
                </center>
                </div>
</body>
</html>