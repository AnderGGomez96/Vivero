<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,minimum-scale=1.0">
                <link rel="stylesheet" href="../css/bootstrap.min.css">
	<title>Terminar un cultivo.</title>
</head>
<body>

	<?php
	if (isset($_POST['submit'])) 
	{
		$codigo_cultivo=$_POST["codigo_cultivo"];
		$termino=$_POST["termino"];

		$error=false;
		if (empty($codigo_cultivo)) {
			echo "<center>cultivo no valido</center>";
			$error=true;
		}
		if (empty($termino)) {
			echo "<center>No se actualizara el cultivo</center>";
			$error=true;
		}
		if ($error)
		{
                    ?>
                        <center><td><input type="button" name="volver" value="Pagina anterior" class="btn btn-success" onclick="window.location.href='terminar_cultivo.php'"></td></center>
                    <?php
		}else
		{
			require('../conexion.php');
			$sql="SELECT codigo_planta, cantidad_cultivo FROM cultivo WHERE (codigo_cultivo=$codigo_cultivo AND termino = 0)";
			$resultado=mysqli_query($link,$sql);
			$extracto=mysqli_fetch_array($resultado);
			
			$actualizar_planta="UPDATE planta SET cantidad_flor = (cantidad_flor + $extracto[cantidad_cultivo]) WHERE codigo_planta=$extracto[codigo_planta]";
			
			if ($link->query($actualizar_planta)===TRUE) {
				$actualizar_cultivo="UPDATE cultivo SET termino=$termino WHERE codigo_cultivo=$codigo_cultivo"; 

				if ($link->query($actualizar_cultivo)===TRUE) {
					echo "<center><p>Registro actualizado satisfactoriamente</p></center>";
                                        ?>
                                        <center><td><input type="button" name="volver" value="Termine un nuevo cultivo" class="btn btn-success" onclick="window.location.href='terminar_cultivo.php'"></td></center>
                                        <?php
				}else
				{
					echo "Error: " . $sql . "<br>" . $link->error;
				}
			}else
			{
				echo "Error: " . $sql . "<br>" . $link->error;
			} 
		if (empty($termino)) {
                    ?>
                    <center><td><input type="button" name="volver" value="Pagina anterior" class="btn btn-success" onclick="window.location.href='terminar_cultivo.php'"></td></center>
                    <?php
		}
	}
        }
	else
	{
	?>
		<form method="POST" action="terminar_cultivo.php">
			<center>
                        <table>
			<tr>
					<td>Codigo cultivo</td>
					<td>
						<select class="form-control" name="codigo_cultivo">
							<?php
								require ('../conexion.php');
								$query= "SELECT * FROM cultivo WHERE termino = 0 ORDER BY codigo_cultivo";
								$resultado= mysqli_query($link,$query);

								while($extraido= mysqli_fetch_array($resultado))
								{
									echo "<option value='$extraido[codigo_cultivo]'>$extraido[codigo_cultivo]</option>";
								}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Terminar cultivo.</td>
					<td>
						<select class="form-control" name="termino">

							<option value="1">Sí.</option>
							<option value="0">No.</option>
							<option value="2">Sí.</option>
							<option value="1">No.</option>
						</select>
					</td>
				</tr>
			</table>
			<input class="btn btn-primary" type="submit" name="submit" value="Terminar">
                        </center>
		</form>
                <center><td><input type="button" name="volver" value="Lista Cultivo" class="btn btn-success" onclick="window.location.href='../Lista/lista_cultivo.php'"></td></center>
	<?php
	}
	?>
</body>
</html>