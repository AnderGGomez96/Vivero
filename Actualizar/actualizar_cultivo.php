<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,minimum-scale=1.0">
                <link rel="stylesheet" href="../css/bootstrap.min.css">
	<title>Actualizar cultivo</title>
</head>
	<body>
		<?php
		if (isset($_POST['submit'])) 
		{
			$codigo_cultivo=$_POST["codigo_cultivo"];
			$codigo_empleado=$_POST["codigo_empleado"];
			$codigo_planta=$_POST["codigo_planta"];
			$cantidad_cultivo=$_POST["cantidad_cultivo"];
			$humedad_cultivo=$_POST["humedad_cultivo"];
			$edad_cultivo=$_POST["edad_cultivo"];
			$dias_abono=$_POST["dias_abono"];
			$crecimiento=$_POST["crecimiento"];
			$muerte=$_POST["muerte"];
			$error=false;
			/*Validaciones*/
			if (empty($codigo_cultivo)) {
				echo "<center><p>codigo_cultivo vacio ó no valido.</p></center>";
				$error=true;
			}
			if (empty($codigo_empleado) || !is_numeric($codigo_empleado) || $codigo_empleado<0) {
				echo "<center><p>codigo empleado vacio ó no valido.</p></center>";
				$error=true;
			}
			if (empty($codigo_planta) || !is_numeric($codigo_planta) || $codigo_planta<0) {
				echo "<center><p>codigo planta vacio ó no valido</p></center>";
				$error=true;
			}
			if (empty($cantidad_cultivo) || !is_numeric($cantidad_cultivo) || $cantidad_cultivo<0) {
				echo "<center><p>cantidad_cultivo vacio ó no valido</p></center>";
				$error=true;
			}
			if (empty($humedad_cultivo) || !is_numeric($humedad_cultivo)|| $humedad_cultivo<0) {
				echo "<center><p>humedad cultivo vacio ó no valido</p></center>";
				$error=true;
			}
			if (empty($dias_abono) || !is_numeric($dias_abono)|| $dias_abono<0) {
				echo "<center><p>dias abono cultivo vacio ó no valido</p></center>";
				$error=true;
			}
			if (empty($crecimiento) || !is_numeric($crecimiento)|| $crecimiento<0) {
				echo "<center><p>crecimiento cultivo vacio ó no valido</p></center>";
				$error=true;
			}
			if (empty($muerte)) {
				echo "<center><p>muerte cultivo vacio ó no valido</p></center>";
				$error=true;
			}
			if ($error)
			{
                            ?>
                                <center><td><input type="button" name="volver" value="Volver" class="btn btn-primary" onclick="window.location.href='actualizar_cultivo.php'"></td></center>
                            <?php
			}else
			{
				require('../conexion.php');
				$retorno="SELECT codigo_planta, cantidad_cultivo FROM cultivo WHERE codigo_cultivo=$codigo_cultivo AND muerte = 0";
				$resultado= mysqli_query($link,$retorno);
				$extraido=mysqli_fetch_array($resultado);
				$actualizar_planta="UPDATE planta SET cantidad_semilla = (cantidad_semilla+$extraido[cantidad_cultivo]) WHERE codigo_planta = $extraido[codigo_planta]";
				if ($link->query($actualizar_planta) === TRUE)
			    {
				    $validar="SELECT cantidad_semilla FROM planta WHERE codigo_planta=$codigo_planta";
					$resultado= mysqli_query($link,$validar);
					$extraido=mysqli_fetch_array($resultado);
					if ($cantidad_cultivo > $extraido['cantidad_semilla'])
					{
						echo "<p>La cantidad de unidades de la planta es mayor a la disponible de semillas : $extraido[cantidad_semilla]</p>";
						echo"<p><button onclick=location.href='actualizar_cultivo.php'>Pagina anterior</button></p>";
					}else
					{
						if ($muerte==2) {
							$muerte=0;
						}
						$sql="UPDATE cultivo SET codigo_empleado=$codigo_empleado, codigo_planta=$codigo_planta,cantidad_cultivo=$cantidad_cultivo,humedad_cultivo=$humedad_cultivo,edad_cultivo=$edad_cultivo,dias_abono=$dias_abono, crecimiento=$crecimiento, muerte=$muerte WHERE codigo_cultivo=$codigo_cultivo";
						if ($link->query($sql) === TRUE)
					    {
						    echo "<p>Registro actualizado satisfactoriamente</p>";

						    $nuevo=$extraido['cantidad_semilla']-$cantidad_cultivo;
						    $sql="UPDATE planta SET cantidad_semilla=$nuevo WHERE codigo_planta=$codigo_planta";
						    if ($link->query($sql) === TRUE)
						    {
					    		echo"<p><button onclick=location.href='actualizar_cultivo.php'>Actualice un nuevo cultivo</button></p>";
							    }else {
							    echo "Error: " . $sql . "<br>" . $link->error;
								}
						} else {
						    echo "Error: " . $sql . "<br>" . $link->error;
						}

		    		}
				}else {
			    	echo"<p>Error al actualizar la tabla planta <button onclick=location.href='actualizar_cultivo.php'>Pagina anterior</button></p>";
				}
			}
		}
		else
		{
		?>
		<div>
                    <table  align = " center "  class = " table ">
                        <thead  class = " thead-dark ">
                            <tr>
                                <th  class = " thead-dark "  scope = " col " > <centro > Codigo cultivo </center > </th >
                                <th  class = " thead-dark "  scope = " col " > <centro > Codigo Empleado </center > </th >
                                <th  class = " thead-dark "  scope = " col " > <centro > Codigo Planta </center > </th >
                                <th  class = " thead-dark "  scope = " col " > <center > Cantidad Cultivo </center > </th >
                                <th  class = " thead-dark "  scope = " col " > <centro > Humedad Cultivo (%)</center > </th >
                                <th  class = " thead-dark "  scope = " col " > <centro > Edad Cultivo (dias)</center > </th >
                                <th  class = " thead-dark "  scope = " col " > <center > Dias abono </center > </th >
                                <th  class = " thead-dark "  scope = " col " > <centro > Crecimiento (mm) </center > </th >
                            </tr >
                            </thead >
					<?php
						require ( '../conexion.php' );
						$query = "SELECT * FROM cultivo WHERE (muerte = 0  AND termino = 0 ) ORDER BY codigo_cultivo " ;
						$resultado = mysqli_query($link,$query);
						while ( $extraido =  mysqli_fetch_array ( $resultado )) {
							echo  " <tr align = 'center'> <td> " . $extraido [ 'codigo_cultivo' ] . " </td> " ;
							echo  " <td> " . $extraido [ 'codigo_empleado' ] . " </td> " ;
							echo  " <td> " . $extraido [ 'codigo_planta' ] . " </td> " ;
							echo  " <td> " . $extraido [ 'cantidad_cultivo' ] . " </td> " ;
							echo  " <td> " . $extraido [ 'humedad_cultivo' ] . " </td> " ;
							echo  " <td> " . $extraido [ 'edad_cultivo' ] . " </td> " ;
							echo  " <td> " . $extraido [ 'dias_abono' ] . " </td> " ;
							echo  " <td> " . $extraido [ 'crecimiento' ] . " </td> " ;
						}
					?>
			</table >
		</div >
		<form method="post" action="actualizar_cultivo.php">
                    <center>
			<table>
				<tr>
					<td>Codigo Cultivo: </td>
					<td>
						<select class="form-control" name="codigo_cultivo">
						<?php
							require ('../conexion.php');
							$query= "SELECT * FROM cultivo WHERE muerte=0 AND termino = 0 ORDER BY codigo_cultivo";
							$resultado= mysqli_query($link,$query);

							while($extraido= mysqli_fetch_array($resultado))
							{
								echo "<option value='$extraido[codigo_cultivo]'>$extraido[codigo_cultivo]</option>";
							}
						?>
						</select>
					</td>
				</tr>
				<tr><td>Codigo empleado: </td>
					<td>
						<select class="form-control" name="codigo_empleado">
						<?php
							require ('../conexion.php');
							$query= "SELECT * FROM empleado WHERE eliminar = 0 ORDER BY codigo_empleado";
							$resultado= mysqli_query($link,$query);

							while($extraido= mysqli_fetch_array($resultado))
							{
								echo "<option value='$extraido[codigo_empleado]'>$extraido[codigo_empleado]</option>";
							}
						?>
						</select>
					</td>
				</tr>
				<tr><td>Codigo planta: </td>
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
				</tr>
					<tr><td>Cantidad cultivo: </td>
					<td><input class="form-control" type="number" name="cantidad_cultivo"></td>
				</tr>
					<tr><td>Humedad cultivo: </td>
					<td><input  class="form-control" type="number" name="humedad_cultivo"></td>
				</tr>
					<tr><td>Edad Cultivo: </td>
					<td><input class="form-control" type="number" name="edad_cultivo"></td>
				</tr>
				<tr><td>Dias abono: </td>
					<td><input class="form-control" type="number" name="dias_abono"></td>
				</tr>
				<tr><td>Crecimiento: </td>
					<td><input class="form-control" type="number" name="crecimiento"></td>
				</tr>
				<tr><td>Muerte: </td>
					<td><select class="form-control" name="muerte">
						<option value=2>0</option>
						<option value=1>1</option>
					</select></td>
				</tr>
			</table>
                        <br>
                        <center> <table align="center">
				<BR>
				<tr>
			<input class="btn btn-primary" type="submit" name="submit" value="Actualizar">
		</form>
                <center><td><input type="button" name="volver" value="Lista cultivo" class="btn btn-success" onclick="window.location.href='../Lista/lista_cultivo.php'"></td></center>
		<?php
		}
		?>
                </center>
	</body>
</html>
