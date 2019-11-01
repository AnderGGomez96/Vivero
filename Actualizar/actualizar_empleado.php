<!DOCTYPE html>
<html>
<head>
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
		if (empty($cedula) || !is_numeric($cedula)) {
			echo "<p>Cedula vacio ó no valido.</p>";
			$error=true;
		}
		if (empty($nombre) || is_numeric($nombre)) {
			echo "<p>Nombre vacio ó no valido</p>";
			$error=true;
		}
		if (empty($apellido1) || is_numeric($apellido1)) {
			echo "<p>Apellido vacio ó no valido</p>";
			$error=true;
		}
		if (empty($apellido2) || is_numeric($apellido2)) {
			echo "<p>Apellido vacio ó no valido</p>";
			$error=true;
		}
		if (empty($telefono) || !is_numeric($telefono)) {
			echo "<p>Telefono vacio ó no valido</p>";
			$error=true;
		}
		if ($error)
		{
			echo"<button onclick=location.href='insertar_empleado.html'>Pagina anterior</button>";
		}else
		{
			require('../conexion.php');

			$sql="UPDATE empleado SET cedula=$cedula, nombre='$nombre', apellido1='$apellido1',apellido2='$apellido2',telefono=$telefono WHERE codigo_empleado=$codigo_empleado ";

			if ($link->query($sql) === TRUE) {
			    echo "<p>Registro actualizado satisfactoriamente</p>";
			    echo"<p><button onclick=location.href='actualizar_empleado.php'>Actualice un nuevo empleado</button></p>";
			    echo"<button onclick=location.href='../Lista/lista_empleado.php'>Lista empleado</button>";
			} else {
			    echo "Error: " . $sql . "<br>" . $link->error;
			}
		}
	}
	else
	{
	?>
	<form method="post" action="actualizar_empleado.php">
		<p>Codigo Empleado: 
			<select name="codigo_empleado">
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
		</p>
		<p>Cedula: <input type="number" name="cedula"></p>
		<p>Nombre: <input type="name" name="nombre"></p>
		<p>Primer Apellido: <input type="name" name="apellido1"></p>
		<p>Segundo Apellido: <input type="name" name="apellido2"></p>
		<p>Telefono: <input type="number" name="telefono"></p>
		<p><input type="submit" name="submit" value="Actualizar" /></p>
	</form>
	<p><button onclick=location.href='../Lista/lista_empleado.php'>Lista Empleado</button></p>
	<?php
	}
	?>
</body>
</html>