<!DOCTYPE html>
<body>
<head>
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,minimum-scale=1.0">
                <link rel="stylesheet" href="../css/bootstrap.min.css">
	<title>Insercion de Empleados</title>
</head>
        <?php 
        if (isset($_POST['eliminar'])){
            $codCul=$_POST["codCul"];
            $error = false;
        /*Validaciones*/
            if (empty($codCul) || !is_numeric($codCul)) {
		echo "<center><p>Codigo vacio ó no valido.</p></center>";
		$error=true;
            }
            if ($error)
            {
                ?>
                <center><td><input type="button" name="volver" value="Pagina anterior" class="btn btn-primary" onclick="window.location.href='Eliminar_cultivo.html'"></td></center>
                <?php
            }else
            {
		require('../conexion.php');

		$sql="UPDATE `cultivo` SET `muerte` = 1,`termino`=1 WHERE `codigo_cultivo` = $codCul";

		if ($link->query($sql) === TRUE) {
		    echo "<p>Cultivo eliminado.</p>";
                    ?>
                    <center><td><input type="button" name="volver" value="Volver" class="btn btn-primary" onclick="window.location.href='../Lista/lista_cultivo.php'"></td></center>
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
                                <th class="thead-dark" scope="col"><center>Codigo cultivo</center></th>
                                <th class="thead-dark" scope="col"><center>Codigo Empleado</center></th>
                                <th class="thead-dark" scope="col"><center>Codigo Planta</center></th>
                                <th class="thead-dark" scope="col"><center>Cantidad Cultivo</center></th>
                                <th class="thead-dark" scope="col"><center>Humedad Cultivo</center></th>
                                <th class="thead-dark" scope="col"><center>Edad Cultivo</center></th>
                                <th class="thead-dark" scope="col"><center>Dias abono</center></th>
                                <th class="thead-dark" scope="col"><center>Crecimiento</center></th>
                            </tr>
                            </thead>
					<?php

						require('../conexion.php');
						$query="SELECT * FROM cultivo WHERE muerte = 0 ORDER BY codigo_cultivo";
						$resultado=mysqli_query($link,$query);

						while ($extraido= mysqli_fetch_array($resultado)) {
							echo "<tr align='center'><td>".$extraido['codigo_cultivo']."</td>";
							echo "<td>".$extraido['codigo_empleado']."</td>";
							echo "<td>".$extraido['codigo_planta']."</td>";
							echo "<td>".$extraido['cantidad_cultivo']."</td>";
							echo "<td>".$extraido['humedad_cultivo']."</td>";
							echo "<td>".$extraido['edad_cultivo']."</td>";
							echo "<td>".$extraido['dias_abono']."</td>";
							echo "<td>".$extraido['crecimiento']."</td>";
						}
					?>
			</table>
            <form method="post" action="eliminarCultivo_Select.php">
		<center><label>
                <tr><td>Codigo cultivo: </td>
                    <td><select class="form-control" name="codCul">
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
                    <br/>
                <p><input class="btn btn-primary" type="submit" name="eliminar" value="Eliminar" /></p>
            </label></center>
            </form>
        <?php
        }
        ?>   
</body>

