<!DOCTYPE html>
<html>
	<head>
                <title>Lista de Cultivos Activos</title>
                <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,minimum-scale=1.0">
                <link rel="stylesheet" href="../css/bootstrap.min.css">
	</head>
	<body>


		
                    <div>
                    <table  align = " center "  class = " table ">
                        <thead  class = " thead-dark ">
                            <tr>
                                <th  class = " thead-dark "  scope = " col " > <centro > Codigo cultivo </center > </th >
                                <th  class = " thead-dark "  scope = " col " > <centro > Nombre Empleado </center > </th >
                                <th  class = " thead-dark "  scope = " col " > <centro > Nombre Planta </center > </th >
                                <th  class = " thead-dark "  scope = " col " > <center > Cantidad Cultivo </center > </th >
                                <th  class = " thead-dark "  scope = " col " > <centro > Humedad Cultivo (%)</center > </th >
                                <th  class = " thead-dark "  scope = " col " > <centro > Edad Cultivo (dias)</center > </th >
                                <th  class = " thead-dark "  scope = " col " > <center > Dias abono </center > </th >
                                <th  class = " thead-dark "  scope = " col " > <centro > Crecimiento (mm) </center > </th >
                            </tr >
                            </thead >
					<?php
						require ( '../conexion.php' );
						$query="SELECT codigo_cultivo, empleado.nombre, planta.nombre,cantidad_cultivo,humedad_cultivo,edad_cultivo,dias_abono,crecimiento FROM cultivo INNER JOIN empleado ON cultivo.codigo_empleado = empleado.codigo_empleado INNER JOIN planta ON cultivo.codigo_planta = planta.codigo_planta WHERE (muerte = 0 AND termino = 0)";
						$resultado = mysqli_query($link,$query);
						while ( $extraido =  mysqli_fetch_array ( $resultado )) {
							echo  " <tr align = 'center'> <td> " . $extraido [ 0 ] . " </td> " ;
							echo  " <td> " . $extraido [ 1 ] . " </td> " ;
							echo  " <td> " . $extraido [ 2 ] . " </td> " ;
							echo  " <td> " . $extraido [ 3 ] . " </td> " ;
							echo  " <td> " . $extraido [ 4 ] . " </td> " ;
							echo  " <td> " . $extraido [ 5 ] . " </td> " ;
							echo  " <td> " . $extraido [ 6 ] . " </td> " ;
							echo  " <td> " . $extraido [ 7 ] . " </td> " ;
						}
					?>
			</table >
		
                    <center> <table align="center">
				<BR>
				<tr>
                                        <input type="button" name="insert" value=" Insertar " class="btn btn-primary" onclick="window.location.href='../HTML/insertar_cultivo.php'">
                                        <input type="button" name="delete" value=" Eliminar " class="btn btn-danger" onclick="window.location.href='../Eliminar/eliminarCultivo_Select.php'">
                                        <input type="button" name="delete" value=" Actualizar " class="btn btn-success" onclick="window.location.href='../Actualizar/actualizar_cultivo.php'">
                                        <input type="button" name="volver" value=" Volver " class="btn btn-info" onclick="window.location.href='../index.php'">
				</tr>
			</table>
			</center>
		</div>
	</body>
</html>
