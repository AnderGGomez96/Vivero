<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,minimum-scale=1.0">
                <link rel="stylesheet" href="../css/bootstrap.min.css">
	<title>Actualizar enfermedad</title>
</head>
<body>
	<?php
	if (isset($_POST['submit'])) 
	{
		$codigo_enfermedad=$_POST["codigo_enfermedad"];
		$nombre_enfermedad=$_POST["nombre_enfermedad"];
		$tratamiento=$_POST["tratamiento"];
		$error=false;
		/*Validaciones*/
		if (empty($codigo_enfermedad)) {
			echo "<center><p>codigo_enfermedad vacio ó no valido.</p></center>";
			$error=true;
		}
		if (empty($nombre_enfermedad) || is_numeric($nombre_enfermedad)) {
			echo "<center><p>codigo enfermedad vacio ó no valido.</p></center>";
			$error=true;
		}
		if (empty($tratamiento) || is_numeric($tratamiento)) {
			echo "<center><p>tratamiento vacio ó no valido</p></center>";
			$error=true;
		}
		if ($error)
		{
                    ?>
                        <center><td><input type="button" name="volver" value="Pagina anterior" class="btn btn-success" onclick="window.location.href='actualizar_enfermedad.php'"></td></center>
                    <?php   
		}else
		{
			require('../conexion.php');

			$sql="UPDATE enfermedad SET nombre_enfermedad='$nombre_enfermedad', tratamiento='$tratamiento' WHERE codigo_enfermedad=$codigo_enfermedad";

			if ($link->query($sql) === TRUE) {
			    echo "<center><p>Registro actualizado satisfactoriamente</p></center>";
                            ?>
                            <center><td><input type="button" name="volver" value="Actualice una nueva enfermedad" class="btn btn-success" onclick="window.location.href='actualizar_enfermedad.php'"></td></center>
                            <?php
			} else {
			    echo "Error: " . $sql . "<br>" . $link->error;
			}
		}
	}
	else
	{
	?>
	<form method="post" action="actualizar_enfermedad.php">
            <center>
		<table>
			<tr>
				<td>Nombre enfermedad</td>
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
                                </tr>
					<tr><td>Nuevo nombre enfermedad  </td>
					<td><input class="form-control" type="name" name="nombre_enfermedad"></td>
				</tr>
                                </tr>
					<tr><td>Tratamiento </td>
					<td><input class="form-control" type="text" name="tratamiento"></td>
				</tr>
		</table>
                <br>
		<input class="btn btn-primary" type="submit" name="submit" value="Actualizar">
	</form>
        <center><td><input type="button" name="volver" value="Lista enfermedad" class="btn btn-success" onclick="window.location.href='../Lista/lista_enfermedad.php'"></td></center>
	<?php
	}
	?>
</body>
</html>