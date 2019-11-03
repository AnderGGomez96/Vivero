<!DOCTYPE html>
<html>
<head>
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
                 echo "<p>Nuevo registro creado satisfactoriamente</p>";
                echo"<p><button onclick=location.href='../Lista/lista_infeccion.php'>Volver</button></p>";
            } else {
                echo "Error: " . $sql . "<br>" . $link->error;
            }
        }else{
            ?>
            <tr><td>Cultivo </td>
                <table border="1">
                    <tr align="center"><td><label>Codigo cultivo</label></td>
                    </tr>

                    <?php
                    require('../conexion.php');
                    $query="SELECT `codigo_cultivo` FROM `cultivo` WHERE `muerte` = 0 ORDER BY `codigo_cultivo`";
                    $resultado=mysqli_query($link,$query);
                    while ($extraido= mysqli_fetch_array($resultado)) {
                        echo "<tr align='center'><td>".$extraido['codigo_cultivo']."</td></tr>";
                        }
                    ?>
                </table>
                <tr><td>Enfermedad </td>
                <table border="1">
                    <tr align="center"><td><label>Enfermedad</label>
                        <td><label>Codigo</label></td></td>
                    </tr>

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
                <form method="post" action="insertar_infeccion.php">

                    <tr><td>Codigo cultivo: </td>
                        <td><select name="codCul">
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
                        <td><select name="codEnfermedad">
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
                        <p><input type="submit" name="insertar" value="Insertar" /></p>
                </form>
        <?php
        }
        ?>
</body>
</html>
