<!DOCTYPE html>
<body>
<head>
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,minimum-scale=1.0">
                <link rel="stylesheet" href="../css/bootstrap.min.css">
	<title>Eliminar empleado</title>
</head>
        <?php 
        if (isset($_POST['eliminar'])) 
	{
            
	$codEmpl=$_POST["codEmpl"];
        $error = false;
        /*Validaciones*/
	if (empty($codEmpl) || !is_numeric($codEmpl)) {
		echo "<center><p>Codigo vacio ó no valido.</p></center>";
		$error=true;
	}
	if ($error)
	{
             ?>
              <center><td><input type="button" name="volver" value="Volver" class="btn btn-primary" onclick="window.location.href='Eliminar_empleado.php'"></td></center>
            <?php
	}else
	{
		require('../conexion.php');

		$sql="UPDATE `empleado` SET `eliminar` = 1 WHERE `codigo_empleado` = $codEmpl";

		if ($link->query($sql) === TRUE) {
		    echo "<br><center><p>Empleado eliminado.</p></center>";
                    ?>
                    <center><td><input type="button" name="volver" value="Volver" class="btn btn-primary" onclick="window.location.href='../Lista/lista_empleado.php'"></td></center>
                    <?php
		} else {
		    echo "Error: " . $sql . "<br>" . $link->error;
		}
	}

	
        }else{
            
        ?>
                <table align="center" class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th class="thead-dark" scope="col"><center>Codigo</center></th>
                                <th class="thead-dark" scope="col"><center>Cedula</center></th>
                                <th class="thead-dark" scope="col"><center>Nombre</center></th>
                                <th class="thead-dark" scope="col"><center>Primer Apellido</center></th>
                                <th class="thead-dark" scope="col"><center>Segundo Apellido</center></th>
                                <th class="thead-dark" scope="col"><center>Telefono</center></th>
                            </tr>
                            </thead>
					<?php

						require('../conexion.php');
						$query="SELECT * FROM empleado WHERE eliminar = 0 ORDER BY codigo_empleado";
						$resultado=mysqli_query($link,$query);

						while ($extraido= mysqli_fetch_array($resultado)) {
							echo "<tr align='center'><td>".$extraido['codigo_empleado']."</td>";
							echo "<td>".$extraido['cedula']."</td>";
							echo "<td>".$extraido['nombre']."</td>";
							echo "<td>".$extraido['apellido1']."</td>";
							echo "<td>".$extraido['apellido2']."</td>";
							echo "<td>".$extraido['telefono']."</td></tr>";
						}
					?>
            </table>
            <form method="post" action="Eliminar_empleado.php">
                <center><label>
            <tr><td>Codigo empleado:</td>
                     <td><select class="form-control" name="codEmpl">
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
                    <br/>
                <p><input class="btn btn-primary" type="submit" name="eliminar" value="Eliminar" /></p>
                    </label></center>
        </form>
        <?php
        }
         ?>   
	
</body>