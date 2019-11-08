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
            $codigo_infeccion=$_POST["codigo_infeccion"];

            require('../conexion.php');

                $sql="UPDATE infeccion SET eliminar = 1 WHERE codigo_infeccion=$codigo_infeccion";

                if ($link->query($sql) === TRUE) {
                echo "<center><p>Registro eliminado</p></center>";
                ?>
                <center><td><input type="button" name="volver" value="Volver" class="btn btn-primary" onclick="window.location.href='../Lista/lista_infeccion.php'"></td></center>
                <?php
                } else {
                    echo "Error: " . $sql . "<br>" . $link->error;
                }
	}else{
            ?>
              <table align="center" class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th class="thead-dark" scope="col"><center>Codigo Infeccion</center></th>
                                <th class="thead-dark" scope="col"><center>Codigo Cultivo</center></th>
                                <th class="thead-dark" scope="col"><center>Nombre Enfermedad</center></th>
                            </tr>
                            </thead>
					<?php
						require('../conexion.php');
						$query="SELECT codigo_infeccion, codigo_cultivo, enfermedad.nombre_enfermedad FROM infeccion INNER JOIN enfermedad ON infeccion.codigo_enfermedad = enfermedad.codigo_enfermedad WHERE (infeccion.eliminar=0 AND enfermedad.eliminar=0)";
                        $resultado=mysqli_query($link,$query);
                        while ($extraido= mysqli_fetch_array($resultado)) {
                            echo "<tr align='center'><td>".$extraido[0]."</td>";
                            echo "<td>".$extraido[1]."</td>";
                            echo "<td>".$extraido[2]."</td></tr>";
                        }
					?>
                    </table>
	<form method="post" action="eliminarInfeccion.php">
            <center><label>
            <tr><td>Codigo infeccion: </td>
		<td><select class="form-control" name="codigo_infeccion">
                    <?php    
			$query= "SELECT * FROM infeccion WHERE eliminar =0";
			$resultado= mysqli_query($link,$query);
                        while($extraido= mysqli_fetch_array($resultado))
			{
                            echo "<option value='$extraido[codigo_infeccion]'>$extraido[codigo_infeccion]</option>";
			}
                    ?>
               </select></td></tr>
                    <br/>
                   <p><input class="btn btn-primary" type="submit" name="insertar" value="Eliminar" /></p>
        </form>
    <?php
        }
        ?>
</body>
</html>