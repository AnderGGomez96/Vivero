<!DOCTYPE html>
<body>
<head>
	<title>Eliminar empleado</title>
</head>
        <?php 
        if (isset($_POST['eliminar'])) 
	{
            
	$codEmpl=$_POST["codEmpl"];
        $error = false;
        /*Validaciones*/
	if (empty($codEmpl) || !is_numeric($codEmpl)) {
		echo "<p>Codigo vacio ó no valido.</p>";
		$error=true;
	}
	if ($error)
	{
		echo"<button onclick=location.href='Eliminar_empleado.php'>Pagina anterior</button>";
	}else
	{
		require('../conexion.php');

		$sql="UPDATE `empleado` SET `eliminar` = 1 WHERE `codigo_empleado` = $codEmpl";

		if ($link->query($sql) === TRUE) {
		    echo "<p>Empleado eliminado.</p>";
		    echo"<p><button onclick=location.href='../Lista/lista_empleado.php'>Volver</button></p>";
		} else {
		    echo "Error: " . $sql . "<br>" . $link->error;
		}
	}

	
        }else{
            
        ?>
            <form method="post" action="Eliminar_empleado.php">
		
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
        <?php
        }
         ?>   
	
</body>