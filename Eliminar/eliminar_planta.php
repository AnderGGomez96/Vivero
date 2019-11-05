<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,minimum-scale=1.0">
                <link rel="stylesheet" href="../css/bootstrap.min.css">
	<title>Eliminar planta</title>
</head>
<body>
        <?php 
        if (isset($_POST['Eliminar'])) 
	{
                $codPlanta = $_POST["codPlanta"];
		require('../conexion.php');
                
                $sql="UPDATE `planta` SET `eliminar` = 1"
                        . " WHERE `codigo_planta`= $codPlanta ";
                
		if ($link->query($sql) === TRUE) {
		    echo "<p>Registro eliminado satisfactoriamente</p>";
		    echo"<p><button onclick=location.href='../Lista/lista_planta.php'>Volver</button></p>";
		} else {
		    echo "Error: " . $sql . "<br>" . $link->error;
		}
        
        }else{
            ?>
                <table align="center" class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="thead-dark" scope="col"><center>CODIGO PLANTA</center></th>
                                        <th class="thead-dark" scope="col"><center>NOMBRE</center></th>
                                        <th class="thead-dark" scope="col"><center>GENERO</center></th>
                                        <th class="thead-dark" scope="col"><center>FAMILIA</center></th>
                                        <th class="thead-dark" scope="col"><center>TIPO DE PLANTA</center></th>
                                        <th class="thead-dark" scope="col"><center>CANTIDAD SEMILA</center></th>
                                        <th class="thead-dark" scope="col"><center>CANTIDAD FLORES</center></th>
                                        <th class="thead-dark" scope="col"><center>PRECIO VENTA</center></th>
                                    </tr>
                                </thead>
					<?php

						require('../conexion.php');
						$query="SELECT * FROM planta WHERE eliminar = 0 ORDER BY codigo_planta";
						$resultado=mysqli_query($link,$query);

						while ($extraido= mysqli_fetch_array($resultado)) {
							echo "<tr align='center'><td>".$extraido['codigo_planta']."</td>";
							echo "<td>".$extraido['nombre']."</td>";
							echo "<td>".$extraido['genero']."</td>";
							echo "<td>".$extraido['familia']."</td>";
							echo "<td>".$extraido['tipo_planta']."</td>";
							echo "<td>".$extraido['cantidad_semilla']."</td>";
							echo "<td>".$extraido['cantidad_flor']."</td>";
							echo "<td>".$extraido['precio_venta']."</td></tr>";
						}
					?>
			</table>
                <form method="post" action="eliminar_planta.php">
                    <center><label>
                    <tr><td>Codigo planta: </td>
                        <td><select class="form-control" name="codPlanta">
                            <?php    
                                $query= "SELECT `codigo_planta`"
                                        ." FROM `planta` WHERE `eliminar` = 0 "
                                        ." ORDER BY `codigo_planta`";
                                $resultado= mysqli_query($link,$query);
                                while($extraido= mysqli_fetch_array($resultado))
                                {
                                    echo "<option value='$extraido[codigo_planta]'>$extraido[codigo_planta]</option>";
                                }
                            ?>
                        </select></td></tr>
                <br/></label>
                        <p><input class="btn btn-primary" type="submit" name="Eliminar" value="Eliminar" /></p>
                </form>
        <?php
        }
	?>
</body>
</html>