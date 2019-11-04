<!DOCTYPE html>
<html>
<head>
	<title>Insercion de ventas</title>
</head>
<body>
    <?php
	if (isset($_POST['agregar'])) 
	{
            $codPlanta=$_POST["codPlanta"];
            $compra=$_POST["compra"];
            $nombre=$_POST["nombre"];
            require('../conexion.php');
            
            $sql="SELECT `nombre` FROM `planta` WHERE `cantidad_semilla` > $compra+1 AND `codigo_planta`=$codPlanta";
            
            $result = mysqli_query($link, $sql);
            $row = mysqli_fetch_array($result, MYSQLI_NUM);
            if(is_null($row)){
                $sql="INSERT INTO ventas (nombre,codigo_planta,unidades)"
                    . "VALUES ('$nombre',$codPlanta,$compra)";
                
                if ($link->query($sql) === TRUE) {
                    echo "<p>Nuevo registro creado satisfactoriamente</p>";
                    echo"<p><button onclick=location.href='../Lista/lista_ventas.php'>Lista ventas</button></p>";
                } else {
                    echo "Error: " . $sql . "<br>" . $link->error;
                }
            }else{
               echo "La cantidad es mayor a la disponible, por favor intente con una menor cantidad";
               echo"<p><button onclick=location.href='../Lista/lista_ventas.php'>Lista ventas</button></p>";
            }
            
            
        }else{
            ?>
                <table border="1">
                <tr align="center"><td><label>Codigo planta</label></td>
                    <td><label>Nombre</label></td>
                    <td><label>Genero</label></td>
                    <td><label>Familia</label></td>
                    <td><label>Tipo de planta</label></td>
                    <td><label>Cantidad semilla</label></td>
                    <td><label>Cantidad flores</label></td>
                    <td><label>Precio venta</label></td>

            <?php

                    require('../conexion.php');
                    $query="SELECT * FROM planta WHERE eliminar = 0 ORDER BY codigo_planta";
                    $resultado=mysqli_query($link,$query);

                    while ($extraido= mysqli_fetch_array($resultado)) {
                        echo "<tr align='center'><td>".$extraido['codigo_planta']."</td>";
                        echo "<td>".$extraido['nombre']."</td>";
                        echo "<td>".$extraido['genero']."</td>";
                        echo "<td>".$extraido['familia']."</td>";
                        echo "<td>".$extraido['tipo_planta']."</td>";
                        echo "<td>".$extraido['cantidad_semilla']."</td>";
                        echo "<td>".$extraido['cantidad_flor']."</td>";
                        echo "<td>".$extraido['precio_venta']."</td></tr>";
                    }
            ?>
                    
                    </table>
                <form method="post" action="insertar_venta.php">
                    <p>Nombre comprador: <input type="name" name="nombre"></p>
                    <tr><td>Codigo planta: </td>
                        <td><select name="codPlanta">
                            <?php    
                                require('../conexion.php');
                                $query= "SELECT `codigo_planta`"
                                        ." FROM `planta` WHERE `eliminar` = 0 "
                                        ." ORDER BY `codigo_planta`";
                                $resultado= mysqli_query($link,$query);
                                while($extraido= mysqli_fetch_array($resultado))
                                {
                                    echo "<option value='$extraido[codigo_planta]'>$extraido[codigo_planta]</option>";
                                }
                            ?>
                        </select></td></tr>
                    <p>Unidades compra: <input type="number" name="compra"></p>
                    <br/>
                        <p><input type="submit" name="agregar" value="Agregar venta" /></p>
                </form>
        <?php
        }
	?>
</body>
</html>