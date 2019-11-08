<!DOCTYPE html>
<body>
<head>
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,minimum-scale=1.0">
                <link rel="stylesheet" href="../css/bootstrap.min.css">
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
                ?>
                <center><td><input type="button" name="volver" value="Pagina anterior" class="btn btn-primary" onclick="window.location.href='eliminar_enfermedad.php'"></td></center>
                <?php
            }else{
		require('../conexion.php');

		$sql="UPDATE `enfermedad` SET `eliminar` = 1 WHERE `codigo_enfermedad` = $codEnfermedad";

		if ($link->query($sql) === TRUE) {
		    echo "<center><p>Empleado eliminado.</p></center>";
                    ?>
                    <center><td><input type="button" name="volver" value="Volver" class="btn btn-primary" onclick="window.location.href='../Lista/lista_enfermedad.php'"></td></center>
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
                                        <th class="thead-dark" scope="col"><center>Codigo Enfermedad</center></th>
                                        <th class="thead-dark" scope="col"><center>Nombre Enfermedad</center></th>
                                        <th class="thead-dark" scope="col"><center>Tratamiento</center></th>

                                    </tr>
                                    </thead>
					<?php

						require('../conexion.php');
						$query="SELECT * FROM enfermedad WHERE eliminar = 0 ORDER BY codigo_enfermedad";
						$resultado=mysqli_query($link,$query);

						while ($extraido= mysqli_fetch_array($resultado)) {
							echo "<tr align='center'><td>".$extraido['codigo_enfermedad']."</td>";
							echo "<td>".$extraido['nombre_enfermedad']."</td>";
							echo "<td>".$extraido['tratamiento']."</td></tr>";
						}
					?>
			</table>
            <form method="post" action="eliminar_enfermedad.php">
                <center><label>
                <tr><td>Nombre enfermedad: </td>
                    <td><select class="form-control" name="codEnfermedad">
                    <?php
			require ('../conexion.php');
			$query= "SELECT * FROM `enfermedad` "
                                . "WHERE `eliminar`= 0 ORDER BY `codigo_enfermedad`";
			$resultado= mysqli_query($link,$query);
                        while($extraido= mysqli_fetch_array($resultado))
			{
                            echo "<option value='$extraido[codigo_enfermedad]'>$extraido[nombre_enfermedad]</option>";
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