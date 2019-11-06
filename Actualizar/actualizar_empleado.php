<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,minimum-scale=1.0">
                <link rel="stylesheet" href="../css/bootstrap.min.css">
	<title>Actualizar empleado</title>
</head>
<body>
	<?php
	if (isset($_POST['submit'])) 
	{
		$codigo_empleado=$_POST['codigo_empleado'];
		$cedula=$_POST["cedula"];
		$nombre=$_POST["nombre"];
		$apellido1=$_POST["apellido1"];
		$apellido2=$_POST["apellido2"];
		$telefono=$_POST["telefono"];
		$error=false;
		/*Validaciones*/
		if (empty($codigo_empleado)) {
			echo "<center><p>codigo_empleado vacio ó no valido.</p></center>";
			$error=true;
		}
		if (empty($cedula) || !is_numeric($cedula) || $cedula<0) {
			echo "<center><p>Cedula vacio ó no valido.</p></center>";
			$error=true;
		}
		if (empty($nombre) || is_numeric($nombre)) {
			echo "<center><p>Nombre vacio ó no valido</p></center>";
			$error=true;
		}
		if (empty($apellido1) || is_numeric($apellido1)) {
			echo "<center><p>Apellido vacio ó no valido</p></center>";
			$error=true;
		}
		if (empty($apellido2) || is_numeric($apellido2)) {
			echo "<center><p>Apellido vacio ó no valido</p></center>";
			$error=true;
		}
		if (empty($telefono) || !is_numeric($telefono) || $telefono<0) {
			echo "<center><p>Telefono vacio ó no valido</p></center>";
			$error=true;
		}
		if ($error)
		{
                    ?>
                        <center><td><input type="button" name="volver" value="Volver" class="btn btn-primary" onclick="window.location.href='actualizar_empleado.php'"></td></center>
                    <?php
		}else
		{
			require('../conexion.php');

			$sql="UPDATE empleado SET cedula=$cedula, nombre='$nombre', apellido1='$apellido1',apellido2='$apellido2',telefono=$telefono WHERE codigo_empleado=$codigo_empleado ";

			if ($link->query($sql) === TRUE) {
			    echo "<center><p>Registro actualizado satisfactoriamente</p></center>";
                            ?>
                            <center><td><input type="button" name="volver" value="Actualice un nuevo empleado" class="btn btn-primary" onclick="window.location.href='actualizar_empleado.php'"></td></center>
                            <center><td><input type="button" name="volver" value="Lista empleado" class="btn btn-primary" onclick="window.location.href='../Lista/lista_empleado.php'"></td></center>
                            <?php
			} else {
			    echo "Error: " . $sql . "<br>" . $link->error;
			}
		}
	}
	else
	{
	?>
	<form method="post" action="actualizar_empleado.php">
            <center>
                <table>
                    <tr>
                        <td>Codigo Empleado </td>
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
                   <tr>
                    <div  class="form-group">
                        <td width="50%">CEDULA</td>
                        <td width="50%"><input min="0" type="number" name="cedula" class="form-control" placeholder="Cedula"></td>
                    </div>
                    </tr>
                    <tr>
                    <div  class="form-group">
                        <td width="50%">NOMBRE</td>
                        <td width="50%"><input type="name" name="nombre" class="form-control" placeholder="Nombre"></td>
                    </div>
                    </tr>
                    <tr>
                    <div  class="form-group">
                        <td width="50%">PRIMER APELLIDO</td>
                        <td width="50%"><input type="name" name="apellido1" class="form-control" placeholder="Primer Apellido"></td>
                    </div>
                    </tr>
                    <tr>
                    <div  class="form-group">
                        <td width="50%">SEGUNDO APELLIDO</td>
                        <td width="50%"><input type="name" name="apellido2" class="form-control" placeholder="Segundo Apellido"></td>
                    </div>
                    </tr>
                    <tr>
                    <div  class="form-group">
                        <td width="50%">TELEFONO</td>
                        <td width="50%"><input min="0" type="number" name="telefono" class="form-control" placeholder="Telefono"></td>
                    </div>
                    </tr>
                </table>
                <br>
		<p><input class="btn btn-primary" type="submit" name="submit" value="Actualizar" /></p>
                
	</form>
        <center><td><input type="button" name="volver" value="Lista empleado" class="btn btn-success" onclick="window.location.href='../Lista/lista_empleado.php'"></td></center>
	<?php
	}
	?>
</body>
</html>