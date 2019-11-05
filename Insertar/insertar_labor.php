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
                $labor=$_POST["nombre_labor"];

		require('../conexion.php');
                
                $sql="SELECT `nombre` FROM labores WHERE `nombre`='$labor'";
                $result = mysqli_query($link, $sql);
                $row = mysqli_fetch_array($result, MYSQLI_BOTH);
        
                if(is_null($row)){
                    $sql="INSERT INTO labores (nombre,eliminar)"
                            . "VALUES ('$labor',0)";
                }else{
                    $sql="UPDATE `labores` SET `eliminar` = 0,`nombre`='$labor'"
                            . " WHERE `nombre` = '$labor'";
                }
		if ($link->query($sql) === TRUE) {
		    echo "<center><p>Nuevo registro creado satisfactoriamente</p></center>";
                    ?>
                    <center><td><input type="button" name="Volver" value="Volver" class="btn btn-primary" onclick="window.location.href='../Lista/lista_labores.php'"></td></center>
                    <?php
		} else {
		    echo "Error: " . $sql . "<br>" . $link->error;
		}
        
        }else{
            ?>
            <form method="post" action="insertar_labor.php">
                <center>
            <table>
                <tr>
                    <div  class="form-group">
                        <td width="50%"><label>NOMBRE LABOR</label></td>
                        <td width="50%"><input type="name" name="nombre_labor" class="form-control" id="exampleInputEmail1" placeholder="Nombre Labor"></td>
                    </div>
                </tr>
                </table>
                    <br>
		<p><input class="btn btn-primary" type="submit" name="insertar" value="Insertar" /></p>
            </form>
    </center>
        </label>
        </div>
        <?php
        }
	?>
</body>
</html>