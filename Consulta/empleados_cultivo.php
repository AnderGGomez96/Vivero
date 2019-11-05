<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,minimum-scale=1.0">
                <link rel="stylesheet" href="../css/bootstrap.min.css">
	<title>Empleados con cultivo</title>
</head>
<body>
            <div>
                    <table align="center" class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th class="thead-dark" scope="col"><center>CODIGO CULTIVO</center></th>
                                <th class="thead-dark" scope="col"><center>CODIGO EMPLEADO</center></th>
                                <th class="thead-dark" scope="col"><center>NOMBRE EMPLEADO</center></th>
                            </tr>
                            </thead>
                            
			<?php
				require('../conexion.php');
				$sql="SELECT codigo_cultivo, cultivo.codigo_empleado, nombre FROM cultivo INNER JOIN empleado ON cultivo.codigo_empleado = empleado.codigo_empleado WHERE (muerte = 0 AND termino = 0)";
				$resultado= mysqli_query($link,$sql);
				while($extraido=mysqli_fetch_array($resultado))
				{
					echo "<tr align='center'><td>".$extraido['codigo_cultivo']."</td>";
					echo "<td>".$extraido['codigo_empleado']."</td>";
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