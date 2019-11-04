<!DOCTYPE html>
<html>
<head>
	<title>Insercion de plantas</title>
</head>
<body>
    <?php
	if (isset($_POST['insertar'])) 
	{
            $nombre=$_POST["nombre"];
            $genero=$_POST["genero"];
            $familia=$_POST["familia"];
            $tipo_planta=$_POST["tipo_planta"];
            $cantidad_semilla=$_POST["cantidad_semilla"];
            $precio_venta=$_POST["precio_venta"];
            $error=FALSE;
            
            if (empty($nombre) || is_numeric($nombre)) {
			echo "<p>Nombre vacio ó no valido.</p>";
			$error=true;
		}
            if (empty($genero) || is_numeric($genero)) {
			echo "<p>Genero vacio ó no valido.</p>";
			$error=true;
		}
            if (empty($familia) || is_numeric($familia)) {
			echo "<p>Familia vacio ó no valido.</p>";
			$error=true;
		}
            if (empty($tipo_planta) || is_numeric($tipo_planta)) {
			echo "<p>Tipo planta vacio ó no valido.</p>";
			$error=true;
		}
            if (empty($cantidad_semilla) || !is_numeric($cantidad_semilla)) {
			echo "<p>Cantidad semilla vacio ó no valido.</p>";
			$error=true;
		}
            if (empty($precio_venta) || !is_numeric($precio_venta)) {
			echo "<p>Precio venta vacio ó no valido.</p>";
			$error=true;
		}
                
            if($error==TRUE){
                echo "<p>Error en la insercion de datos</p>";
                echo"<p><button onclick=location.href='insertar_planta.php'>Volver</button></p>";
            }else{
                require('../conexion.php');
                
                $sql="SELECT `codigo_planta` FROM `planta` "
                     . "WHERE (`nombre`='$nombre' AND `genero`='$genero')"
                     . "AND(`familia`='$familia' AND `tipo_planta`='$tipo_planta')";
                
                $result = mysqli_query($link, $sql);
                $row = mysqli_fetch_array($result, MYSQLI_NUM);
                
                if(is_null($row)){
                   $sql="INSERT INTO planta (nombre,genero,familia,tipo_planta,cantidad_semilla,precio_venta,eliminar)"
                        . "VALUES ('$nombre','$genero','$familia','$tipo_planta','$cantidad_semilla','$precio_venta',0)";
                } else {
                    $sql="UPDATE `planta` SET `eliminar` = 0"
                        . " WHERE (`nombre`='$nombre' AND `genero`='$genero')"
                        . "AND(`familia`='$familia' AND `tipo_planta`='$tipo_planta')";
                }
                if ($link->query($sql) === TRUE) {
		    echo "<p>Nuevo registro creado satisfactoriamente</p>";
		    echo"<p><button onclick=location.href='../Lista/lista_planta.php'>Lista plantas</button></p>";
		} else {
		    echo "Error: " . $sql . "<br>" . $link->error;
		}
            }
        }else{
            ?>
    <form method="post" action="insertar_planta.php">
		<p>Nombre: <input type="name" name="nombre"></p>
		<p>Genero: <input type="name" name="genero"></p>
		<p>Familia: <input type="name" name="familia"></p>
		<p>Tipo planta: <input type="name" name="tipo_planta"></p>
		<p>Cantidad semilla: <input type="number" name="cantidad_semilla"></p>
                <p>Precio venta: <input type="number" name="precio_venta"></p>
		<p><input type="submit" name="insertar" value="Insertar" /></p>
            </form>
        <?php
        }
	?>
</body>
</html>