<!DOCTYPE html>

<head>
	<title>Insercion de Empleados</title>
</head>
	<form method="post" action="eliminar_cultivo.php">
		
            <tr><td>Codigo cultivo: </td>
		<td><select name="codCul">
                    <?php
			require ('../conexion.php');
			$query= "SELECT `codigo_cultivo` FROM `cultivo` WHERE `muerte`= 0 ORDER BY `codigo_cultivo`";
			$resultado= mysqli_query($link,$query);
                        while($extraido= mysqli_fetch_array($resultado))
			{
                            echo "<option value='$extraido[codigo_cultivo]'>$extraido[codigo_cultivo]</option>";
			}
                    ?>
		</select></td></tr>
                <p><input type="submit" name="eliminar" value="Eliminar" /></p>
        </form>

