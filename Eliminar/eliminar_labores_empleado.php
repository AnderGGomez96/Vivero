<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,minimum-scale=1.0">
                <link rel="stylesheet" href="../css/bootstrap.min.css">
	<title>Eliminar labores</title>
</head>
<body>
        <?php 
        if (isset($_POST['Eliminar'])) 
	{
                $codLabor = $_POST["codLabor"];
		require('../conexion.php');
                
                $sql="UPDATE `labores_empleados` SET `eliminar` = 1"
                        . " WHERE `codigo_labor_empleado`= $codLabor ";
                
		if ($link->query($sql) === TRUE) {
		    echo "<p>Registro eliminado satisfactoriamente</p>";
		    echo"<p><button onclick=location.href='../Lista/lista_labores_empleado.php'>Volver</button></p>";
		} else {
		    echo "Error: " . $sql . "<br>" . $link->error;
		}
        
        }else{
            ?>
                <table border="1">
                    <tr align="center"><td><label>Codigo labor-empleado</label></td>
                    <td><label>Codigo empleado</label></td>
                    <td><label>Codigo labor</label></td></tr>

                    <?php
                        require('../conexion.php');
                        //$query="SELECT * FROM labores_empleados WHERE eliminar = 0 ORDER BY codigo_labor_empleado";
                        $query="SELECT * FROM labores_empleados WHERE codigo_empleado IN (SELECT codigo_empleado FROM empleado WHERE eliminar = 0) AND eliminar=0";
                        $resultado=mysqli_query($link,$query);
                        while ($extraido= mysqli_fetch_array($resultado)) {
                        echo "<tr align='center'><td>".$extraido['codigo_labor_empleado']."</td>";
                        echo "<td>".$extraido['codigo_empleado']."</td>";
                        echo "<td>".$extraido['codigo_labor']."</td></tr>";
                        }
                    ?>
		</table>
           
                <form method="post" action="eliminar_labores_empleado.php">

                    <tr><td>Codigo labor empleado: </td>
                        <td><select name="codLabor">
                            <?php    
                                $query= "SELECT `codigo_labor_empleado`"
                                        ." FROM `labores_empleados` WHERE `eliminar` = 0 "
                                        ." ORDER BY `codigo_labor_empleado`";
                                $resultado= mysqli_query($link,$query);
                                while($extraido= mysqli_fetch_array($resultado))
                                {
                                    echo "<option value='$extraido[codigo_labor_empleado]'>$extraido[codigo_labor_empleado]</option>";
                                }
                            ?>
                        </select></td></tr>
                    <br/>
                        <p><input type="submit" name="Eliminar" value="Eliminar" /></p>
                </form>
        <?php
        }
	?>
</body>
</html>