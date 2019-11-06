<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,minimum-scale=1.0">
                <link rel="stylesheet" href="../css/bootstrap.min.css">
	<title>Actualizar planta</title>
</head>
<body>
	<?php
	if (isset($_POST['submit'])) 
	{
		$codigo_planta=$_POST["codigo_planta"];
		$nombre=$_POST["nombre"];
		$genero=$_POST["genero"];
		$familia=$_POST["familia"];
		$tipo_planta=$_POST["tipo_planta"];
		$cantidad_semilla=$_POST["cantidad_semilla"];
		$cantidad_flor=$_POST["cantidad_flor"];
		$precio_venta=$_POST["precio_venta"];
		$error=false;
		/*Validaciones*/
		if (empty($codigo_planta)) {
			echo "<center><p>codigo_planta empleado vacio ó no valido.</p></center>";
			$error=true;
		}
		if (empty($nombre) || is_numeric($nombre)) {
			echo "<center><p>nombre empleado vacio ó no valido.</p></center>";
			$error=true;
		}
		if (empty($genero) || is_numeric($genero)) {
			echo "<center><p>genero planta vacio ó no valido</p></center>";
			$error=true;
		}
		if (empty($familia) || is_numeric($familia)) {
			echo "<center><p>familia vacio ó no valido</p></center>";
			$error=true;
		}
		if (empty($tipo_planta) || is_numeric($tipo_planta)) {
			echo "<center><p>tipo_planta cultivo vacio ó no valido</p></center>";
			$error=true;
		}
		if (empty($cantidad_semilla) || !is_numeric($cantidad_semilla) || $cantidad_semilla<0) {
			echo "<center><p>cantidad_semilla abono cultivo vacio ó no valido</p></center>";
			$error=true;
		}
		if (empty($cantidad_flor) || !is_numeric($cantidad_flor) || $cantidad_flor<0) {
			echo "<center><p>cantidad_flor cultivo vacio ó no valido</p></center>";
			$error=true;
		}
		if (empty($precio_venta) || !is_numeric($precio_venta) || $precio_venta<0) {
			echo "<center><p>precio_venta cultivo vacio ó no valido</p></center>";
			$error=true;
		}
		if ($error)
		{
                    ?>
                        <center><td><input type="button" name="volver" value="Pagina anterior" class="btn btn-success" onclick="window.location.href='actualizar_planta.php'"></td></center>
                    <?php
		}else
		{
			require('../conexion.php');

			$sql="UPDATE planta SET nombre='$nombre', genero='$genero',familia='$familia',tipo_planta='$tipo_planta',cantidad_semilla=$cantidad_semilla,cantidad_flor=$cantidad_flor, precio_venta=$precio_venta WHERE codigo_planta=$codigo_planta";

			if ($link->query($sql) === TRUE) {
			    echo "<center><p>Registro actualizado satisfactoriamente</p></center>";
                            ?>
                            <center><td><input type="button" name="volver" value="Actualice una nueva planta" class="btn btn-success" onclick="window.location.href='actualizar_planta.php'"></td></center>
                            <?php
                        } else {
			    echo "Error: " . $sql . "<br>" . $link->error;
			}
		}
	}
	else
	{
	?>
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
		</div>
	<form method="post" action="actualizar_planta.php">
		<center>
		<table>
			<tr>
				<td>Codigo planta</td>
				<td>
					<select class="form-control" name="codigo_planta">
					<?php
						require ('../conexion.php');
						$query= "SELECT * FROM planta WHERE eliminar = 0 ORDER BY codigo_planta";
						$resultado= mysqli_query($link,$query);

						while($extraido= mysqli_fetch_array($resultado))
						{
							echo "<option value='$extraido[codigo_planta]'>$extraido[codigo_planta]</option>";
						}
					?>
					</select>
				</td>
                        <tr>
                            <div  class="form-group">
                                <td width="50%"><label>NOMBRE</label></td>
                                <td width="50%"><input type="name" name="nombre" class="form-control" placeholder="Nombre"></td>
                            </div>
                        </tr>
                        <tr>
                            <div  class="form-group">
                                <td width="50%"><label>GENERO</label></td>
                                <td width="50%"><input type="name" name="genero" class="form-control" placeholder="Genero"></td>
                            </div>
                        </tr>
			<tr>
                            <div  class="form-group">
                                <td width="50%"><label>FAMILIA</label></td>
                                <td width="50%"><input type="name" name="familia" class="form-control" placeholder="Familia"></td>
                            </div>
                        </tr>
			<tr>
                            <div  class="form-group">
                                <td width="50%"><label>TIPO PLANTA</label></td>
                                <td width="50%"><input type="name" name="tipo_planta" class="form-control" placeholder="Tipo Planta"></td>
                            </div>
                        </tr>	
			<tr>
                            <div  class="form-group">
                                <td width="50%"><label>CANTIDAD SEMILLA</label></td>
                                <td width="50%"><input type="name" name="cantidad_semilla" class="form-control" placeholder="Cantidad Semilla"></td>
                            </div>
                        </tr>	
			<tr>
                            <div  class="form-group">
                                <td width="50%"><label>CANTIDAD FLOR</label></td>
                                <td width="50%"><input type="number" name="cantidad_flor" class="form-control" placeholder="Cantidad Flor"></td>
                            </div>
                        </tr>	
			<tr>
                            <div  class="form-group">
                                <td width="50%"><label>PRECIO VENTA</label></td>
                                <td width="50%"><input type="number" name="precio_venta" class="form-control" placeholder="Precio Venta"></td>
                            </div>
                        </tr>
		</table>
                    <br>
		<input class="btn btn-primary" type="submit" name="submit" value="Actualizar">
                </center>
	</form>
        <center><td><input type="button" name="volver" value="Lista Planta" class="btn btn-success" onclick="window.location.href='../Lista/lista_planta.php'"></td></center>
	<?php
	}
	?>
</body>
</html>