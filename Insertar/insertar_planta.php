<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,minimum-scale=1.0">
                <link rel="stylesheet" href="../css/bootstrap.min.css">
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
			echo "<center><p>Nombre vacio ó no valido.</p></center>";
			$error=true;
		}
            if (empty($genero) || is_numeric($genero)) {
			echo "<center><p>Genero vacio ó no valido.</p></center>";
			$error=true;
		}
            if (empty($familia) || is_numeric($familia)) {
			echo "<center><p>Familia vacio ó no valido.</p></center>";
			$error=true;
		}
            if (empty($tipo_planta) || is_numeric($tipo_planta)) {
			echo "<center><p>Tipo planta vacio ó no valido.</p></center>";
			$error=true;
		}
            if (empty($cantidad_semilla) || !is_numeric($cantidad_semilla) || $cantidad_semilla<0) {
			echo "<center><p>Cantidad semilla vacio ó no valido.</p></center>";
			$error=true;
		}
            if (empty($precio_venta) || !is_numeric($precio_venta) || $cantidad_semilla<0) {
			echo "<center><p>Precio venta vacio ó no valido.</p></center>";
			$error=true;
		}
                
            if($error==TRUE){
                echo "<center><p>Error en la insercion de datos</p></center>";
                ?>
                <center><td><input type="button" name="Volver" value="Volver" class="btn btn-primary" onclick="window.location.href='insertar_planta.php'"></td></center>
                <?php
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
            <div class="container text-center">
            <label>
            <form method="post" action="insertar_planta.php">
                <center>
                <table>
                <tr>
                    <div  class="form-group">
                        <td width="50%"><label>NOMBRE</label></td>
                        <td width="50%"><input type="name" name="nombre" class="form-control" placeholder="NOMBRE"></td>
                    </div>
                </tr>
                <tr>
                    <div  class="form-group">
                        <td width="50%"><label>GENERO</label></td>
                        <td width="50%"><input type="name" name="genero" class="form-control" placeholder="GENERO"></td>
                    </div>
                </tr>
                <tr>
                    <div  class="form-group">
                        <td width="50%"><label>FAMILIA</label></td>
                        <td width="50%"><input type="name" name="familia" class="form-control" placeholder="FAMILIA"></td>
                    </div>
                </tr>
                <tr>
                    <div  class="form-group">
                        <td width="50%"><label>TIPO DE PLANTA</label></td>
                        <td width="50%"><input type="name" name="tipo_planta" class="form-control" placeholder="TIPO DE PLANTA"></td>
                    </div>
                </tr>
                <tr>
                    <div  class="form-group">
                        <td width="50%"><label>CANTIDAD SEMILLA</label></td>
                        <td width="50%"><input min="0" type="number" name="cantidad_semilla" class="form-control" placeholder="CANTIDAD SEMILLA"></td>
                    </div>
                </tr>
                <tr>
                    <div  class="form-group">
                        <td width="50%"><label>PRECIO VENTA</label></td>
                        <td width="50%"><input min="0" type="number" name="precio_venta" class="form-control" placeholder="PRECIO DE LA VENTA"></td>
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