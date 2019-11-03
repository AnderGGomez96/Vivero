<!DOCTYPE html>
<html>
<head>
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
		    echo "<p>Nuevo registro creado satisfactoriamente</p>";
		    echo"<p><button onclick=location.href='../Lista/lista_labores.php'>Volver</button></p>";
		} else {
		    echo "Error: " . $sql . "<br>" . $link->error;
		}
        
        }else{
            ?>
            <form method="post" action="insertar_labor.php">
                <p>Nombre labor: <input type="name" name="nombre_labor"></p>
		<p><input type="submit" name="insertar" value="Insertar" /></p>
            </form>
        <?php
        }
	?>
</body>
</html>