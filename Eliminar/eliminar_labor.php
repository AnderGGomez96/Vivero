<!DOCTYPE html>
<body>
<head>
	<title>Eliminar labor</title>
</head>
        <?php
        if (isset($_POST['eliminar'])){
            $labor=$_POST["labor_eliminar"];
          
            require('../conexion.php');

            $sql="UPDATE `labores` SET `eliminar` = 1 WHERE `nombre` = '$labor'";

            if ($link->query($sql) === TRUE) {
		echo "<p>Labor eliminada.</p>";
		echo"<p><button onclick=location.href='../Lista/lista_labores.php'>Volver</button></p>";
            } else {
                echo "Error: " . $sql . "<br>" . $link->error;
            }
            
        }else{
            ?>
            <form method="post" action="eliminar_labor.php">
                <tr><td>Labor eliminar: </td>
                    <td><select name="labor_eliminar">
                    <?php
			require ('../conexion.php');
			$query= "SELECT `nombre` FROM `labores` WHERE `eliminar`=0";
			$resultado= mysqli_query($link,$query);
                        while($extraido= mysqli_fetch_array($resultado))
			{
                            echo "<option value='$extraido[nombre]'>$extraido[nombre]</option>";
			}
                    ?>
		</select></td></tr>
                <p><input type="submit" name="eliminar" value="Eliminar" /></p>
        </form>
        <?php
        }
        ?>
</body>