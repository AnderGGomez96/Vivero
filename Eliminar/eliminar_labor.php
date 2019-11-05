<!DOCTYPE html>
<body>
<head>
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,minimum-scale=1.0">
                <link rel="stylesheet" href="../css/bootstrap.min.css">
	<title>Eliminar labor</title>
</head>
        <?php
        if (isset($_POST['eliminar'])){
            $labor=$_POST["labor_eliminar"];
          
            require('../conexion.php');

            $sql="UPDATE `labores` SET `eliminar` = 1 WHERE `nombre` = '$labor'";

            if ($link->query($sql) === TRUE) {
		echo "<center><p>Labor eliminada.</p></center>";
                ?>
                <center><td><input type="button" name="volver" value="Volver" class="btn btn-primary" onclick="window.location.href='../Lista/lista_labores.php'"></td></center>
                <?php
            } else {
                echo "Error: " . $sql . "<br>" . $link->error;
            }
            
        }else{
            ?>
                        <table align="center" class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="thead-dark" scope="col"><center>CODIGO LABOR</center></th>
                                        <th class="thead-dark" scope="col"><center>NOMBRE</center></th>
                                    </tr>
                                    </thead>
					<?php

						require('../conexion.php');
						$query="SELECT * FROM labores WHERE eliminar = 0 ORDER BY codigo_labor";
						$resultado=mysqli_query($link,$query);

						while ($extraido= mysqli_fetch_array($resultado)) {
							echo "<tr align='center'><td>".$extraido['codigo_labor']."</td>";
							echo "<td>".$extraido['nombre']."</td></tr>";
						}
					?>
			</table>
            <form method="post" action="eliminar_labor.php">
                <center><label>
                <tr><td>Labor eliminar: </td>
                    <td><select class="form-control" name="labor_eliminar">
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
                <br/></label>
                <p><input class="btn btn-primary" type="submit" name="eliminar" value="Eliminar" /></p>
        </form>
        <?php
        }
        ?>
</body>