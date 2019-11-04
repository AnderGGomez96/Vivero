<!DOCTYPE html>
<html>
<head>
	<title>Insercion de Empleados</title>
</head>
<body>
        <?php 
        if (isset($_POST['insertar'])) 
	{
                $codEmpleado=$_POST["codEmpleado"];
                $codLabor = $_POST["codLabor"];
		require('../conexion.php');
                
                $sql="SELECT `codigo_labor_empleado` FROM labores_empleados "
                        ."WHERE `eliminar`=0 AND "
                        . "(`codigo_empleado`=$codEmpleado AND `codigo_labor`=$codLabor)";
                $result = mysqli_query($link, $sql);
                $row = mysqli_fetch_array($result, MYSQLI_BOTH);
        
                if(is_null($row)){
                    $sql="INSERT INTO labores_empleados (codigo_empleado,codigo_labor,eliminar)"
                            . "VALUES ($codEmpleado,$codLabor,0)";
                }else{
                    $sql="UPDATE `labores_empleados` SET `eliminar` = 0"
                            . " WHERE (`codigo_empleado`=$codEmpleado "
                            . "AND `codigo_labor`=$codLabor)";
                }
		if ($link->query($sql) === TRUE) {
		    echo "<p>Nuevo registro creado satisfactoriamente</p>";
		    echo"<p><button onclick=location.href='../Lista/lista_labores_empleado.php'>Volver</button></p>";
		} else {
		    echo "Error: " . $sql . "<br>" . $link->error;
		}
        
        }else{
            ?>
            <tr><td>Empleados </td>
                <table border="1">
                    <tr align="center"><td><label>Codigo</label></td>
                    <td><label>Nombre</label></td>
                    <td><label>Apellido 1</label></td>
                    <td><label>Apellido 2</label></td>
                    </tr>

                    <?php
                    require('../conexion.php');
                    $query="SELECT `codigo_empleado`,`nombre`,`apellido1`,`apellido2` FROM `empleado` WHERE `eliminar`=0";
                    $resultado=mysqli_query($link,$query);
                    while ($extraido= mysqli_fetch_array($resultado)) {
                        echo "<tr align='center'><td>".$extraido['codigo_empleado']."</td>";
                        echo "<td>".$extraido['nombre']."</td>";
                        echo "<td>".$extraido['apellido1']."</td>";
                        echo "<td>".$extraido['apellido2']."</td></tr>";
                        }
                    ?>
                </table>
                <tr><td>Labores </td>
                <table border="1">
                    <tr align="center"><td><label>Codigo</label>
                        <td><label>Labor</label></td>
                    </tr>

                    <?php
                    require('../conexion.php');
                    $query="SELECT `codigo_labor`,`nombre` FROM `labores` WHERE `eliminar`=0";
                    $resultado=mysqli_query($link,$query);
                    while ($extraido= mysqli_fetch_array($resultado)) {
                        echo "<tr align='center'><td>".$extraido['codigo_labor']."</td>";
                        echo "<td>".$extraido['nombre']."</td></tr>";
                        }
                    ?>
                </table>
                <form method="post" action="insertar_labores_empleado.php">

                    <tr><td>Codigo empleado: </td>
                        <td><select name="codEmpleado">
                            <?php    
                                $query= "SELECT `codigo_empleado`"
                                        . " FROM `empleado` WHERE `eliminar` = 0 "
                                        . "ORDER BY `codigo_empleado`";
                                $resultado= mysqli_query($link,$query);
                                while($extraido= mysqli_fetch_array($resultado))
                                {
                                    echo "<option value='$extraido[codigo_empleado]'>$extraido[codigo_empleado]</option>";
                                }
                            ?>
                        </select></td></tr>
                    <br/>
                    <tr><td>Codigo labor: </td>
                        <td><select name="codLabor">
                            <?php
                                require ('../conexion.php');
                                $query= "SELECT `codigo_labor` FROM `labores` WHERE `eliminar`=0";
                                $resultado= mysqli_query($link,$query);
                                while($extraido= mysqli_fetch_array($resultado))
                                {
                                    echo "<option value='$extraido[codigo_labor]'>$extraido[codigo_labor]</option>";
                                }
                            ?>
                        </select></td></tr>
                        <p><input type="submit" name="insertar" value="Insertar" /></p>
                </form>
        <?php
        }
	?>
</body>
</html>