<!DOCTYPE html>
<html>
	<head>
                <title>Lista de Cultivos Activos</title>
                <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,minimum-scale=1.0">
                <link rel="stylesheet" href="../css/bootstrap.min.css">
	</head>
	<body>
		<?php
		if (isset($_POST['submit'])) 
		{
			$codigo_cultivo=$_POST["codigo_cultivo"];
			$terminar=$_POST["terminar"];
			$error=false;
			/*Validaciones*/
			if (empty($codigo_cultivo)) {
				echo "<center><p>codigo_cultivo vacio ó no valido.</p></center>";
				$error=true;
			}
			if (empty($terminar)) {
				echo "<center><p>No se terminara el cultivo</p></center>";
				$error=true;
			}
			if ($error)
			{
                            ?>
                                <center><td><input type="button" name="volver" value="Volver" class="btn btn-primary" onclick="window.location.href='terminar_cultivo.php'"></td></center>
                            <?php
			}else
			{
				require('../conexion.php');

				$retorno="SELECT codigo_planta, cantidad_cultivo FROM cultivo WHERE codigo_cultivo=$codigo_cultivo AND muerte = 0";
				$resultado= mysqli_query($link,$retorno);
				$extraido=mysqli_fetch_array($resultado);
				$actualizar_planta="UPDATE planta SET cantidad_flor = (cantidad_flor+$extraido[cantidad_cultivo]) WHERE codigo_planta = $extraido[codigo_planta]";
				if ($link->query($actualizar_planta) === TRUE) {
					$sql="UPDATE cultivo SET termino=$terminar WHERE codigo_cultivo=$codigo_cultivo";
					if ($link->query($sql) === TRUE)
				    {
                                            ?>
                                <br>
                                        <center><td><input type="button" name="volver" value="Termine un nuevo cultivo" class="btn btn-success" onclick="window.location.href='terminar_cultivo.php'"></td></center>
					<?php
                                        } else {
					    echo "Error: " . $sql . "<br>" . $link->error;
					}
				}else
				{
					echo "Error: " . $actualizar_planta . "<br>" . $link->error;
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
	                                <th class="thead-dark" scope="col"><center>Codigo cultivo</center></th>
	                                <th class="thead-dark" scope="col"><center>Codigo Empleado</center></th>
	                                <th class="thead-dark" scope="col"><center>Codigo Planta</center></th>
	                                <th class="thead-dark" scope="col"><center>Cantidad Cultivo</center></th>
	                                <th class="thead-dark" scope="col"><center>Humedad Cultivo</center></th>
	                                <th class="thead-dark" scope="col"><center>Edad Cultivo</center></th>
	                                <th class="thead-dark" scope="col"><center>Dias abono</center></th>
	                                <th class="thead-dark" scope="col"><center>Crecimiento</center></th>
	                            </tr>
	                            </thead>
						<?php

							require('../conexion.php');
							$query="SELECT * FROM cultivo WHERE (muerte = 0 AND  termino =0) ORDER BY codigo_cultivo";
							$resultado=mysqli_query($link,$query);

							while ($extraido= mysqli_fetch_array($resultado)) {
								echo "<tr align='center'><td>".$extraido['codigo_cultivo']."</td>";
								echo "<td>".$extraido['codigo_empleado']."</td>";
								echo "<td>".$extraido['codigo_planta']."</td>";
								echo "<td>".$extraido['cantidad_cultivo']."</td>";
								echo "<td>".$extraido['humedad_cultivo']."</td>";
								echo "<td>".$extraido['edad_cultivo']."</td>";
								echo "<td>".$extraido['dias_abono']."</td>";
								echo "<td>".$extraido['crecimiento']."</td>";
							}
						?>
				</table>
		<form method="post" action="terminar_cultivo.php">
                    <center><label> 
	                    <tr><td>Codigo cultivo: </td>
	                        
	                        <td><select class="form-control" name="codigo_cultivo">
	                            <?php    
	                                $query= "SELECT `codigo_cultivo`"
	                                        . " FROM `cultivo` WHERE (`muerte` = 0 AND `termino` = 0)"
	                                        . "ORDER BY `codigo_cultivo`";
	                                $resultado= mysqli_query($link,$query);
	                                while($extraido= mysqli_fetch_array($resultado))
	                                {
	                                    echo "<option value='$extraido[codigo_cultivo]'>$extraido[codigo_cultivo]</option>";
	                                }
	                            ?>
	                        </select></td></tr>
	                    <br/>
	                    <tr><td>Terminar: </td>
	                        <td><select class="form-control" name="terminar">
	                        	<option value=1>Sí</option>
	                        	<option value=0>No</option>
	                        </select></td></tr>
	                        <p><input class="btn btn-primary" type="submit" name="submit" value="Terminar" /></p>
                        </label></center>
	                </form>
	                <center><td><input type="button" name="volver" value="Lista cultivo" class="btn btn-success" onclick="window.location.href='../Lista/lista_cultivo.php'"></td></center>
			</div>
		<?php
		}
		?>
	</body>
</html>
