<!DOCTYPE html>
<body>
<head>
	<title>Eliminar enfermedad</title>
</head>
        <?php
        if (isset($_POST['eliminar'])){
            $codEnfermedad=$_POST["codEnfermedad"];
            $error = false;
        /*Validaciones*/
            if (empty($codEnfermedad) || !is_numeric($codEnfermedad)) {
		echo "<p>Codigo vacio ó no valido.</p>";
		$error=true;
            }
            if ($error){
		echo"<button onclick=location.href='eliminar_enfermedad.php'>Pagina anterior</button>";
            }else{
		require('../conexion.php');

		$sql="UPDATE `enfermedad` SET `eliminar` = 1 WHERE `codigo_enfermedad` = $codEnfermedad";

		if ($link->query($sql) === TRUE) {
		    echo "<p>Empleado eliminado.</p>";
		    echo"<p><button onclick=location.href='../Lista/lista_enfermedad.php'>Volver</button></p>";
		} else {
		    echo "Error: " . $sql . "<br>" . $link->error;
		}
            }
        }else{
            ?>
            <form method="post" action="eliminar_enfermedad.php">
                <tr><td>Codigo enfermedad: </td>
                    <td><select name="codEnfermedad">
                    <?php
			require ('../conexion.php');
			$query= "SELECT `codigo_enfermedad` FROM `enfermedad` "
                                . "WHERE `eliminar`= 0 ORDER BY `codigo_enfermedad`";
			$resultado= mysqli_query($link,$query);
                        while($extraido= mysqli_fetch_array($resultado))
			{
                            echo "<option value='$extraido[codigo_enfermedad]'>$extraido[codigo_enfermedad]</option>";
			}
                    ?>
		</select></td></tr>
                <p><input type="submit" name="eliminar" value="Eliminar" /></p>
        </form>
        <?php
        }
        ?>
</body>