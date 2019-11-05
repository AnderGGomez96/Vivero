<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,minimum-scale=1.0">
                <link rel="stylesheet" href="../css/bootstrap.min.css">
	<title>Insercion de infeccion</title>
</head>
<body>
        <?php
	if (isset($_POST['insertar'])) 
	{
            $codCultivo=$_POST["codCul"];
            $Enfermedad=$_POST["codEnfermedad"];
	
            require('../conexion.php');
                
            $sql="SELECT `codigo_cultivo` FROM infeccion  WHERE `codigo_cultivo`='$codCultivo' AND `codigo_enfermedad`='$Enfermedad'";
             $result = mysqli_query($link, $sql);
            $row = mysqli_fetch_array($result, MYSQLI_NUM);
            if(is_null($row)){
                 $sql="INSERT INTO `infeccion` (codigo_cultivo,codigo_enfermedad,eliminar)"
                . "VALUES ($codCultivo,'$Enfermedad',0)";
             }else{
          
                $sql="UPDATE `infeccion` SET `eliminar` = 0"
                    . " WHERE `codigo_cultivo`=$codCultivo "
                    . "AND `codigo_enfermedad`='$Enfermedad'";
            }
            if ($link->query($sql) === TRUE) {
                 echo "<center><p>Nuevo registro creado satisfactoriamente</p></center>";
                 ?>
                <center><td><input type="button" name="volver" value="Volver" class="btn btn-primary" onclick="window.location.href='../Lista/lista_infeccion.php'"></td></center>
                <?php
            } else {
                echo "Error: " . $sql . "<br>" . $link->error;
            }
        }else{
            ?>
            <center><label>
            <center><tr><p class="h2">Cultivo </p><center>
                    <table align="center" class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th class="thead-dark" scope="col"><center>CODIGO CULTIVO</center></th>
                            </tr>
                            </thead>  
                    <?php
                    require('../conexion.php');
                    $query="SELECT `codigo_cultivo` FROM `cultivo` WHERE `muerte` = 0 ORDER BY `codigo_cultivo`";
                    $resultado=mysqli_query($link,$query);
                    while ($extraido= mysqli_fetch_array($resultado)) {
                        echo "<tr align='center'><td>".$extraido['codigo_cultivo']."</td></tr>";
                        }
                    ?>
                </table>
                    </label></center>
                <label>
                    <tr><p class="h2">Enfermedad </p>
                    <table align="center" class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th class="thead-dark" scope="col"><center>ENFERMEDAD</center></th>
                                <th class="thead-dark" scope="col"><center>CODIGO</center></th>
                            </tr>
                            </thead>     

                    <?php
                    require('../conexion.php');
                    $query="SELECT `nombre_enfermedad`,`codigo_enfermedad` FROM `enfermedad` WHERE `eliminar` = 0 ";
                    $resultado=mysqli_query($link,$query);
                    while ($extraido= mysqli_fetch_array($resultado)) {
                        echo "<tr align='center'><td>".$extraido['codigo_enfermedad']."</td>";
                        echo "<td>".$extraido['nombre_enfermedad']."</td></tr>";
                        }
                    ?>
                </table>
                </label>
                <form method="post" action="insertar_infeccion.php">
                    
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
                                require ('../conexion.php');
                                $query= "SELECT `codigo_enfermedad` FROM `enfermedad` WHERE `eliminar` = 0";
                                $resultado= mysqli_query($link,$query);
                                while($extraido= mysqli_fetch_array($resultado))
                                {
                                    echo "<option value='$extraido[codigo_enfermedad]'>$extraido[codigo_enfermedad]</option>";
                                }
                            ?>
                        </select></td></tr>
                        <p><input class="btn btn-primary" type="submit" name="insertar" value="Insertar" /></p>
                </form>
        <?php
        }
        ?>
</body>
</html>
