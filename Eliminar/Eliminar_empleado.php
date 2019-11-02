<!DOCTYPE html>

<head>
	<title>Eliminar empleado</title>
</head>
	<form method="post" action="eliminarEmpleado.php">
		
            <tr><td>Codigo empleado: </td>
		<td><select name="codEmpl">
                    <?php
			require ('../conexion.php');
			$query= "SELECT `codigo_empleado` FROM `empleado` WHERE `eliminar`= 0 ORDER BY `codigo_empleado`";
			$resultado= mysqli_query($link,$query);
                        while($extraido= mysqli_fetch_array($resultado))
			{
                            echo "<option value='$extraido[codigo_empleado]'>$extraido[codigo_empleado]</option>";
			}
                    ?>
		</select></td></tr>
                <p><input type="submit" name="eliminar" value="Eliminar" /></p>
        </form>
