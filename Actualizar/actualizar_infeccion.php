<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,minimum-scale=1.0">
                <link rel="stylesheet" href="../css/bootstrap.min.css">
	<title>Actualizar infeccion</title>
</head>
<body>
	<?php
	if (isset($_POST['submit'])) 
	{
		$codigo_infeccion=$_POST["codigo_infeccion"];
		$codigo_cultivo=$_POST["codigo_cultivo"];
		$codigo_enfermedad=$_POST["codigo_enfermedad"];
		$error=false;
		/*Validaciones*/
		if (empty($codigo_infeccion)) {
			echo "<center><p>codigo_infeccion vacio ó no valido.</p></center>";
			$error=true;
		}
		if (empty($codigo_cultivo) || !is_numeric($codigo_cultivo)) {
			echo "<center><p>codigo_cultivo vacio ó no valido.</p></center>";
			$error=true;
		}
		if (empty($codigo_enfermedad) || !is_numeric($codigo_enfermedad)) {
			echo "<center><p>codigo_enfermedad vacio ó no valido</p></center>";
			$error=true;
		}
		if ($error)
		{
                    ?>
                    <center><td><input type="button" name="volver" value="Pagina anterior" class="btn btn-success" onclick="window.location.href='actualizar_infeccion.php'"></td></center>
                   <?php
		}else
		{
			require('../conexion.php');

			$sql="UPDATE infeccion SET codigo_cultivo=$codigo_cultivo, codigo_enfermedad=$codigo_enfermedad WHERE codigo_infeccion=$codigo_infeccion";

			if ($link->query($sql) === TRUE) {
                            echo "<center><p>Registro actualizado satisfactoriamente</p></center>";
                            ?>
                            <center><td><input type="button" name="volver" value="Actualice una nueva infeccion" class="btn btn-success" onclick="window.location.href='actualizar_infeccion.php'"></td></center>
                            <?php
			} else {
			    echo "Error: " . $sql . "<br>" . $link->error;
			}
		}
	}
	else
	{
	?>
	<form method="post" action="actualizar_infeccion.php">
		<center>
		<table>
			<tr>
				<td>Codigo infeccion</td>
				<td>
					<select class="form-control" name="codigo_infeccion">
					<?php
						require ('../conexion.php');
						$query= "SELECT * FROM infeccion WHERE eliminar = 0 ORDER BY codigo_infeccion";
						$resultado= mysqli_query($link,$query);

						while($extraido= mysqli_fetch_array($resultado))
						{
							echo "<option value='$extraido[codigo_infeccion]'>$extraido[codigo_infeccion]</option>";
						}
					?>
					</select>
				</td>
			</tr>
			<tr><td>Codigo cultivo:</td>
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
				</td>
			</tr>
					</select>
		<tr><td>Nombre enfermedad:</td>
				<td>
					<select class="form-control" name="codigo_enfermedad">
					<?php
						require ('../conexion.php');
						$query= "SELECT * FROM enfermedad WHERE eliminar = 0 ORDER BY codigo_enfermedad";
						$resultado= mysqli_query($link,$query);

						while($extraido= mysqli_fetch_array($resultado))
						{
							echo "<option value='$extraido[codigo_enfermedad]'>$extraido[nombre_enfermedad]</option>";
						}
					?>
					</select>
				</td>
			</tr>
		</table>
                
		<input class="btn btn-primary" type="submit" name="submit" value="Actualizar">
                </center>
	</form>
        <center><td><input type="button" name="volver" value="Lista infeccion" class="btn btn-success" onclick="window.location.href='../Lista/lista_infeccion.php'"></td></center>
	<?php
	}
	?>
</body>
</html>