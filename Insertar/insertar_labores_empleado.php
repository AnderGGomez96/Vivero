<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,minimum-scale=1.0">
                <link rel="stylesheet" href="../css/bootstrap.min.css">
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
		    echo "<center><p>Nuevo registro creado satisfactoriamente</p></center>";
                    ?>
<center><td><input type="button" name="labores_empleados" value="Lista Labores Empleado" class="btn btn-primary" onclick="window.location.href='../Lista/lista_labores_empleado.php'"></td></center>
                    <?php
		} else {
		    echo "Error: " . $sql . "<br>" . $link->error;
		}
        
        }else{
            ?>
        <center><label>
            <center><tr><p class="h2">EMPLEADOS</p><center>
                    <table align="center" class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th class="thead-dark" scope="col"><center>CODIGO</center></th>
                                <th class="thead-dark" scope="col"><center>NOMBRE</center></th>
                                <th class="thead-dark" scope="col"><center>APELLIDO 1</center></th>
                                <th class="thead-dark" scope="col"><center>APELLIDO 2</center></th>
                            </tr>
                            </thead>  
                        
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
                    </label></center>
                
                <center><label>
            <center><tr><p class="h2">LABORES</p><center>
                    <table align="center" class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th class="thead-dark" scope="col"><center>CODIGO</center></th>
                                <th class="thead-dark" scope="col"><center>LABOR</center></th>
                            </tr>
                            </thead> 
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
                    </label></center>
                <form method="post" action="insertar_labores_empleado.php">

                    <tr><td>Codigo empleado: </td>
                        <td><select class="form-control" name="codEmpleado">
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
                        <td><select class="form-control" name="codLabor">
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
                    <br>
                        <p><input class="btn btn-primary" type="submit" name="insertar" value="Insertar" /></p>
                </form>
        <?php
        }
	?>
</body>
</html>