<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,minimum-scale=1.0">
                <link rel="stylesheet" href="../css/bootstrap.min.css">
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

            $sql="SELECT `nombre` FROM `planta` WHERE (`cantidad_flor` >= $compra) AND `codigo_planta`=$codPlanta";
            $result = mysqli_query($link, $sql);
            $row = mysqli_fetch_array($result, MYSQLI_NUM);
            if(!is_null($row)){
                $sql="INSERT INTO ventas (nombre,codigo_planta,unidades)"
                    . "VALUES ('$nombre',$codPlanta,$compra)";
                
                
                if ($link->query($sql) === TRUE) {
                } else {
                    echo "Error: " . $sql . "<br>" . $link->error;
                }
                
                $sql="UPDATE `planta` SET `cantidad_flor`=(`cantidad_flor`-$compra) WHERE `codigo_planta`=$codPlanta";
                
                if ($link->query($sql) === TRUE) {
                    
                    echo "<center><p>Nuevo registro creado satisfactoriamente</p></center>";
                    ?>
                    <center><td><input type="button" name="insertar" value="Lista ventas" class="btn btn-primary" onclick="window.location.href='../Lista/lista_ventas.php'"></td></center>
                    <?php
                } else {
                    echo "Error: " . $sql . "<br>" . $link->error;
                }
            }else{
               echo "<center>La cantidad es mayor a la disponible, por favor intente con una menor cantidad</center>";
               ?>
                <center><td><input type="button" name="insertar" value="Lista ventas" class="btn btn-primary" onclick="window.location.href='../Lista/lista_ventas.php'"></td></center>
               <?php
            }
            
            
        }else{
            ?>
            <center><label>
                    <table align="center" class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th class="thead-dark" scope="col"><center>CODIGO PLANTA</center></th>
                                <th class="thead-dark" scope="col"><center>NOMBRE</center></th>
                                <th class="thead-dark" scope="col"><center>GENERO</center></th>
                                <th class="thead-dark" scope="col"><center>FAMILIA</center></th>
                                <th class="thead-dark" scope="col"><center>TIPO DE PLANTA</center></th>
                                <th class="thead-dark" scope="col"><center>CANTIDAD SEMILLA</center></th>
                                <th class="thead-dark" scope="col"><center>CANTIDAD FLORES</center></th>
                                <th class="thead-dark" scope="col"><center>PRECIO VENTA</center></th>
                            </tr>
                            </thead> 
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
                 
                <div class="container text-center">
                <label>
                <form method="post" action="insertar_venta.php">
                    <center>
                        <table>
                            <tr>
                                <div  class="form-group">
                                    <td width="50%"><label>NOMBRE COMPRADOR</label></td>
                                    <td width="50%"><input type="name" name="nombre" class="form-control" placeholder="Nombre Comprador"></td>
                                </div>
                            </tr>
                            <tr>
                                <div  class="form-group">
                                    <td width="50%"><label>UNIDADES COMPRA</label></td>
                                    <td width="50%"><input min="0" type="number" name="compra" class="form-control" placeholder="UNIDADES A COMPAR"></td>
                                </div>
                            </tr>                   
                            <tr>
                                <div  class="form-group">
                                    <td width="50%"><label>NOMBRE PLANTA</label></td>
                                </div>
                            </tr>
                        </table>
                        <td><select class="form-control" name="codPlanta">
                            <?php    
                                require('../conexion.php');
                                $query= "SELECT *"
                                        ." FROM `planta` WHERE `eliminar` = 0 "
                                        ." ORDER BY `codigo_planta`";
                                $resultado= mysqli_query($link,$query);
                                while($extraido= mysqli_fetch_array($resultado))
                                {
                                    echo "<option value='$extraido[codigo_planta]'>$extraido[nombre]</option>";
                                }
                            ?>
                        </select></td></tr>
                    <br>
                     <p><input class="btn btn-primary" type="submit" name="agregar" value="Agregar venta" /></p>
                </form>
        <?php
        }
	?>
</body>
</html>