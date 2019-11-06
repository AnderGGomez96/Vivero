<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,minimum-scale=1.0">
                <link rel="stylesheet" href="../css/bootstrap.min.css">
	<title>Actualizar labor</title>
</head>
<body>
	<?php
	if (isset($_POST['submit'])) 
	{
		$codigo_labor=$_POST["codigo_labor"];
		$nombre=$_POST["nombre"];
		$error=false;
		/*Validaciones*/
		if (empty($codigo_labor)) {
			echo "<center><p>codigo_labor vacio ó no valido.</p>";
			$error=true;
		}
		if (empty($nombre) || is_numeric($nombre)) {
			echo "<center><p>nombre vacio ó no valido.</p>";
			$error=true;
		}
		
		if ($error)
		{
                    ?>
                    <center><td><input type="button" name="volver" value="Pagina anterior" class="btn btn-success" onclick="window.location.href='actualizar_labores.php'"></td></center>
                     <?php
		}else
		{
			require('../conexion.php');

			$sql="UPDATE labores SET nombre='$nombre' WHERE codigo_labor=$codigo_labor";

			if ($link->query($sql) === TRUE) {
			    echo "<center><p>Registro actualizado satisfactoriamente</p></center>";
                            ?>
                            <center><td><input type="button" name="volver" value="Actualice una nueva labor" class="btn btn-success" onclick="window.location.href='actualizar_labores.php'"></td></center>
                            <?php
                        } else {
			    echo "Error: " . $sql . "<br>" . $link->error;
			}
		}
	}
	else
	{
	?>
	<form method="post" action="actualizar_labores.php">
		<center>
		<table>
			<tr>
				<td>Codigo labor</td>
				<td>
					<select class="form-control" name="codigo_labor">
					<?php
						require ('../conexion.php');
						$query= "SELECT * FROM labores WHERE eliminar = 0 ORDER BY codigo_labor";
						$resultado= mysqli_query($link,$query);

						while($extraido= mysqli_fetch_array($resultado))
						{
							echo "<option value='$extraido[codigo_labor]'>$extraido[codigo_labor]</option>";
						}
					?>
					</select>
				</td>
                                <tr>
                    <div class="form-group">
                        <td width="50%"><label>NOMBRE</label></td>
                        <td width="50%"><input type="name" name="nombre" class="form-control" placeholder="NOMBRE"></td>
                    </div>
                </tr>
		</table>
                    <br>
		<input class="btn btn-primary" type="submit" name="submit" value="Actualizar">
	</form>
        <center><td><input type="button" name="volver" value="Volver" class="btn btn-success" onclick="window.location.href='../Lista/lista_labores.php'"></td></center>
	<?php
	}
	?>
</body>
</html>