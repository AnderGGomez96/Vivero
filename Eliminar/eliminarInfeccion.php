<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,minimum-scale=1.0">
                <link rel="stylesheet" href="../css/bootstrap.min.css">
	<title>Eliminar infeccion</title>
</head>
<body>
    
        
	<?php 
        if (isset($_POST['insertar'])) 
	{
            $codCultivo=$_POST["codCul"];
            $Enfermedad=$_POST["codEnfermedad"];

            require('../conexion.php');

            $sql="SELECT `codigo_cultivo` FROM infeccion  WHERE  `eliminar` = 0 AND (`codigo_enfermedad`=$Enfermedad AND `codigo_cultivo`=$codCultivo)";
            $result = mysqli_query($link, $sql);
            $row = mysqli_fetch_array($result, MYSQLI_NUM);
            if(!is_null($row)){
                $sql="UPDATE `infeccion` SET `eliminar` = 1"
                    . " WHERE `codigo_cultivo`=$codCultivo "
                    . "AND `codigo_enfermedad`='$Enfermedad'";

                if ($link->query($sql) === TRUE) {
                echo "<center><p>Registro eliminado</p></center>";
                ?>
                <center><td><input type="button" name="volver" value="Volver" class="btn btn-primary" onclick="window.location.href='../Lista/lista_infeccion.php'"></td></center>
                <?php
                } else {
                    echo "Error: " . $sql . "<br>" . $link->error;
                }
            }else{
                echo "El cultivo no esta registrado con la enfermedad $Enfermedad";
                ?>
                <center><td><input type="button" name="volver" value="Volver" class="btn btn-primary" onclick="window.location.href='../Lista/lista_infeccion.php'"></td></center>
                <?php
            }
	}else{
            ?>
              <table align="center" class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th class="thead-dark" scope="col"><center>Codigo Infeccion</center></th>
                                <th class="thead-dark" scope="col"><center>Codigo Cultivo</center></th>
                                <th class="thead-dark" scope="col"><center>Codigo Enfermedad</center></th>
                            </tr>
                            </thead>
					<?php
						require('../conexion.php');
						$query="SELECT * FROM infeccion WHERE `codigo_cultivo`"
                                                        . " IN (SELECT `codigo_cultivo` FROM cultivo"
                                                        . " WHERE (`muerte` = 0 AND `termino`=0)"
                                                        . " ORDER BY `codigo_cultivo`) AND `eliminar`=0";
						$resultado=mysqli_query($link,$query);
						while ($extraido= mysqli_fetch_array($resultado)) {
							echo "<tr align='center'><td>".$extraido['codigo_infeccion']."</td>";
							echo "<td>".$extraido['codigo_cultivo']."</td>";
							echo "<td>".$extraido['codigo_enfermedad']."</td></tr>";
						}
					?>
                    </table>
	<form method="post" action="eliminarInfeccion.php">
            <center><label>
            <tr><td>Codigo cultivo: </td>
		<td><select class="form-control" name="codCul">
                    <?php    
			$query= "SELECT `codigo_cultivo`"
                                . " FROM `cultivo` WHERE `muerte` = 0 "
                                . "ORDER BY `codigo_cultivo`";
			$resultado= mysqli_query($link,$query);
                        while($extraido= mysqli_fetch_array($resultado))
			{
                            echo "<option value='$extraido[codigo_cultivo]'>$extraido[codigo_cultivo]</option>";
			}
                    ?>
               </select></td></tr>
                    <br/>
            <tr><td>Enfermedad: </td>
		<td><select class="form-control" name="codEnfermedad">
                    <?php
			$query= "SELECT `codigo_enfermedad` FROM `enfermedad` WHERE `eliminar` = 0";
			$resultado= mysqli_query($link,$query);
                        while($extraido= mysqli_fetch_array($resultado))
			{
                            echo "<option value='$extraido[codigo_enfermedad]'>$extraido[codigo_enfermedad]</option>";
			}
                    ?>
		</select></td></tr>
            <br>
                <p><input class="btn btn-primary" type="submit" name="insertar" value="Eliminar" /></p>
        </form>
    <?php
        }
        ?>
</body>
</html>