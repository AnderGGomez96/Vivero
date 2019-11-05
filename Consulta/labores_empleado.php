<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,minimum-scale=1.0">
                <link rel="stylesheet" href="../css/bootstrap.min.css">
	<title>labores de los empleados</title>
</head>
<body>
                <div>
                    <table align="center" class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th class="thead-dark" scope="col"><center>CODIGO EMPLEADO</center></th>
                                <th class="thead-dark" scope="col"><center>NOMBRE EMPLEADO</center></th>
                                <th class="thead-dark" scope="col"><center>CODIGO LABOR</center></th>
                                <th class="thead-dark" scope="col"><center>NOMBRE LABOR</center></th>
                            </tr>
                            </thead>

			<?php
				require('../conexion.php');
				$sql="SELECT empleado.codigo_empleado, empleado.nombre, labores.codigo_labor, labores.nombre FROM (labores_empleados INNER JOIN empleado ON labores_empleados.codigo_empleado = empleado.codigo_empleado) INNER JOIN labores ON labores_empleados.codigo_labor = labores.codigo_labor WHERE (empleado.eliminar =0 AND labores.eliminar=0) AND labores_empleados.eliminar=0";
				$resultado= mysqli_query($link,$sql);
				while($extraido=mysqli_fetch_array($resultado))
				{
					echo "<tr align='center'><td>".$extraido['codigo_empleado']."</td>";
					echo "<td>".$extraido[1]."</td>";
					echo "<td>".$extraido['codigo_labor']."</td>";
					echo "<td>".$extraido['nombre']."</td></tr>";
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