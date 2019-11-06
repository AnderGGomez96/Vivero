<!DOCTYPE html>
<html>
	<head>
            <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,minimum-scale=1.0">
                <link rel="stylesheet" href="../css/bootstrap.min.css">
		<title>Lista de ventas Activos</title>
	</head>
	<body>
		<div>
                    <table align="center" class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="thead-dark" scope="col"><center>CODIGO VENTA</center></th>
                                        <th class="thead-dark" scope="col"><center>NOMBRE</center></th>
                                        <th class="thead-dark" scope="col"><center>CODIGO PLANTA</center></th>
                                        <th class="thead-dark" scope="col"><center>UNIDADES</center></th>
                                        <th class="thead-dark" scope="col"><center>VALOR VENTA</center></th>
                                    </tr>
                                </thead>              
					<?php
						require('../conexion.php');
						$query="SELECT * FROM ventas ORDER BY codigo_ventas";
						$resultado=mysqli_query($link,$query);
						while ($extraido= mysqli_fetch_array($resultado)) {
							echo "<tr align='center'><td>".$extraido['codigo_ventas']."</td>";
							echo "<td>".$extraido['nombre']."</td>";
							echo "<td>".$extraido['codigo_planta']."</td>";
							echo "<td>".$extraido['unidades']."</td>";
							$sql="SELECT precio_venta FROM planta WHERE codigo_planta=$extraido[codigo_planta] ORDER BY codigo_planta";
							$resul=mysqli_query($link,$sql);
							$extracto=mysqli_fetch_array($resul);
							$op=$extracto['precio_venta']*$extraido['unidades'];
							echo "<td>".$op."</td></tr>";
						}
					?>
			</table>
                   <center> <table align="center">
                        <BR>
                        <tr>
                    <center><input class="btn btn-primary" type="button" name="insert" value="Insertar" onclick="window.location.href='../Insertar/insertar_venta.php'">
			<input class="btn btn-success" type="button" name="updat" value="Actualizar" onclick="window.location.href='../Actualizar/actualizar_ventas.php'">
			<input class="btn btn-info" type="button" name="volver" value="Volver" onclick="window.location.href='../index.php'"></center>
		</div>
            </tr>
		</table>
                </center>
            </label></center>
          
	</body>
</html>