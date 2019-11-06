<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,minimum-scale=1.0">
                <link rel="stylesheet" href="../css/bootstrap.min.css">
	<title>Actualizar Venta</title>
</head>
<body>
	<?php
	if (isset($_POST['submit'])) 
	{
		$codigo_ventas=$_POST["codigo_ventas"];
		$nombre=$_POST["nombre"];
		$codigo_planta=$_POST["codigo_planta"];
		$unidades=$_POST["unidades"];
		$error=false;
		/*Validaciones*/
		if (empty($codigo_ventas)) {
			echo "<center><p>codigo_ventas cliente vacio ó no valido.</p></center>";
			$error=true;
		}
		if (empty($nombre) || is_numeric($nombre)) {
			echo "<center><p>nombre cliente vacio ó no valido.</p></center>";
			$error=true;
		}
		if (empty($codigo_planta) || !is_numeric($codigo_planta)) {
			echo "<center><p>codigo planta vacio ó no valido</p></center>";
			$error=true;
		}
		if (empty($unidades) || !is_numeric($unidades) || $unidades<0) {
			echo "<center><p>unidades vacio ó no valido</p></center>";
			$error=true;
		}
		if ($error)
		{
                    ?>
                        <center><td><input type="button" name="volver" value="Pagina anterior" class="btn btn-success" onclick="window.location.href='actualizar_ventas.php'"></td></center>
                    <?php
		}else
		{
			require('../conexion.php');

			$validar="SELECT cantidad_flor FROM planta WHERE codigo_planta=$codigo_planta";
			$resultado= mysqli_query($link,$validar);
			$extraido=mysqli_fetch_array($resultado);
			if ($unidades >$extraido['cantidad_flor']) {
				echo "<center><p>La cantidad de unidades de la planta es mayor a la disponible : $extraido[cantidad_flor]</p></center>";
                                ?>
                                    <center><td><input type="button" name="volver" value="Pagina anterior" class="btn btn-success" onclick="window.location.href='actualizar_ventas.php'"></td></center>
                                <?php
			}else
			{
				$sql="UPDATE ventas SET nombre='$nombre', codigo_planta=$codigo_planta,unidades=$unidades WHERE codigo_ventas=$codigo_ventas";


				if ($link->query($sql) === TRUE) {
				    echo "<center><p>Registro actualizado satisfactoriamente</p></center>";
				    $nuevo=$extraido['cantidad_flor']-$unidades;
				    $sql="UPDATE planta SET cantidad_flor=$nuevo WHERE codigo_planta=$codigo_planta";
				    if ($link->query($sql) === TRUE)
				    {
                                        ?>
                                        <center><td><input type="button" name="volver" value="Actualice una nueva venta" class="btn btn-success" onclick="window.location.href='actualizar_ventas.php'"></td></center>
                                        <?php
				    }else {
				    echo "Error: " . $sql . "<br>" . $link->error;
				}
				    
				} else {
				    echo "Error: " . $sql . "<br>" . $link->error;
				}
			}
		}
	}
	else
	{
	?>
	<form method="post" action="actualizar_ventas.php">
		<center>
		<table>
			<tr>
				<td>CODIGO VENTA</td>
				<td>
					<select class="form-control" name="codigo_ventas">
					<?php
						require ('../conexion.php');
						$query= "SELECT * FROM ventas ORDER BY codigo_ventas";
						$resultado= mysqli_query($link,$query);

						while($extraido= mysqli_fetch_array($resultado))
						{
							echo "<option value='$extraido[codigo_ventas]'>$extraido[codigo_ventas]</option>";
						}
					?>
					</select>
				</td>
			</tr>
                        <tr>
                            <div  class="form-group">
                                <td width="50%"><label>NOMBRE CLIENTE</label></td>
                                <td width="50%"><input type="name" name="nombre" class="form-control" placeholder="Nombre Cliente"></td>
                            </div>
                        </tr>
				<tr><td>CODIGO PLANTA</td>
				<td>
					<select class="form-control" name="codigo_planta">
					<?php
						require ('../conexion.php');
						$query= "SELECT * FROM planta WHERE eliminar=0 ORDER BY codigo_planta";
						$resultado= mysqli_query($link,$query);

						while($extraido= mysqli_fetch_array($resultado))
						{
							echo "<option value='$extraido[codigo_planta]'>$extraido[codigo_planta]</option>";
						}
					?>
					</select>
				</td>
			</tr>
                        <tr>
                            <div  class="form-group">
                                <td width="50%"><label>UNIDADES</label></td>
                                <td width="50%"><input type="number" name="unidades" class="form-control" placeholder="Unidades"></td>
                            </div>
                        </tr>
		</table>
                    <br>
		<input class="btn btn-primary" type="submit" name="submit" value="Actualizar">
                </center>
	</form>
        <center><td><input type="button" name="volver" value="Lista ventas" class="btn btn-success" onclick="window.location.href='../Lista/lista_ventas.php'"></td></center>
	<?php
	}
	?>
</body>
</html>