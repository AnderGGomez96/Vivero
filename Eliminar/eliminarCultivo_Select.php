<!DOCTYPE html>
<body>
<head>
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,minimum-scale=1.0">
                <link rel="stylesheet" href="../css/bootstrap.min.css">
	<title>Insercion de Empleados</title>
</head>
        <?php 
        if (isset($_POST['eliminar'])){
            $codCul=$_POST["codCul"];
            $error = false;
        /*Validaciones*/
            if (empty($codCul) || !is_numeric($codCul)) {
		echo "<center><p>Codigo vacio ó no valido.</p></center>";
		$error=true;
            }
            if ($error)
            {
                ?>
                <center><td><input type="button" name="volver" value="Pagina anterior" class="btn btn-primary" onclick="window.location.href='Eliminar_cultivo.html'"></td></center>
                <?php
            }else
            {
		require('../conexion.php');

		$sql="UPDATE `cultivo` SET `muerte` = 1,`termino`=1 WHERE `codigo_cultivo` = $codCul";

		if ($link->query($sql) === TRUE) {
		    echo "<p>Cultivo eliminado.</p>";
                    ?>
                    <center><td><input type="button" name="volver" value="Volver" class="btn btn-primary" onclick="window.location.href='../Lista/lista_cultivo.php'"></td></center>
                    <?php
                } else {
		    echo "Error: " . $sql . "<br>" . $link->error;
		}
            }
        }else{
            ?>
                 
                    <table  align = " center "  class = " table ">
                        <thead  class = " thead-dark ">
                            <tr>
                                <th  class = " thead-dark "  scope = " col " > <centro > Codigo cultivo </center > </th >
                                <th  class = " thead-dark "  scope = " col " > <centro > Nombre Empleado </center > </th >
                                <th  class = " thead-dark "  scope = " col " > <centro > Nombre Planta </center > </th >
                                <th  class = " thead-dark "  scope = " col " > <center > Cantidad Cultivo </center > </th >
                                <th  class = " thead-dark "  scope = " col " > <centro > Humedad Cultivo (%)</center > </th >
                                <th  class = " thead-dark "  scope = " col " > <centro > Edad Cultivo (dias)</center > </th >
                                <th  class = " thead-dark "  scope = " col " > <center > Dias abono </center > </th >
                                <th  class = " thead-dark "  scope = " col " > <centro > Crecimiento (mm) </center > </th >
                            </tr >
                            </thead >
                    <?php
                        require ( '../conexion.php' );
                        $query="SELECT codigo_cultivo, empleado.nombre, planta.nombre,cantidad_cultivo,humedad_cultivo,edad_cultivo,dias_abono,crecimiento FROM cultivo INNER JOIN empleado ON cultivo.codigo_empleado = empleado.codigo_empleado INNER JOIN planta ON cultivo.codigo_planta = planta.codigo_planta WHERE (muerte = 0 AND termino = 0)";
                        $resultado = mysqli_query($link,$query);
                        while ( $extraido =  mysqli_fetch_array ( $resultado )) {
                            echo  " <tr align = 'center'> <td> " . $extraido [ 0 ] . " </td> " ;
                            echo  " <td> " . $extraido [ 1 ] . " </td> " ;
                            echo  " <td> " . $extraido [ 2 ] . " </td> " ;
                            echo  " <td> " . $extraido [ 3 ] . " </td> " ;
                            echo  " <td> " . $extraido [ 4 ] . " </td> " ;
                            echo  " <td> " . $extraido [ 5 ] . " </td> " ;
                            echo  " <td> " . $extraido [ 6 ] . " </td> " ;
                            echo  " <td> " . $extraido [ 7 ] . " </td> " ;
                        }
                    ?>
            </table >
        
            <form method="post" action="eliminarCultivo_Select.php">
		<center><label>
                <tr><td>Codigo cultivo: </td>
                    <td><select class="form-control" name="codCul">
                        <?php
                            require ('../conexion.php');
                            $query= "SELECT `codigo_cultivo` FROM `cultivo` WHERE `muerte`= 0 ORDER BY `codigo_cultivo`";
                            $resultado= mysqli_query($link,$query);
                            while($extraido= mysqli_fetch_array($resultado))
                            {
                                echo "<option value='$extraido[codigo_cultivo]'>$extraido[codigo_cultivo]</option>";
                            }
                        ?>
		</select></td></tr>
                    <br/>
                <p><input class="btn btn-primary" type="submit" name="eliminar" value="Eliminar" /></p>
            </label></center>
            </form>
        <?php
        }
        ?>   
</body>

