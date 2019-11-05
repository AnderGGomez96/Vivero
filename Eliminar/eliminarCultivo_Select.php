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
		echo "<p>Codigo vacio ó no valido.</p>";
		$error=true;
            }
            if ($error)
            {
		echo"<button onclick=location.href='Eliminar_cultivo.html'>Pagina anterior</button>";
            }else
            {
		require('../conexion.php');

		$sql="UPDATE `cultivo` SET `muerte` = 1,`termino`=1 WHERE `codigo_cultivo` = $codCul";

		if ($link->query($sql) === TRUE) {
		    echo "<p>Cultivo eliminado.</p>";
		    echo"<p><button onclick=location.href='../Lista/lista_cultivo.php'>Volver</button></p>";
		} else {
		    echo "Error: " . $sql . "<br>" . $link->error;
		}
            }
        }else{
            ?>
            <form method="post" action="eliminarCultivo_Select.php">
		
                <tr><td>Codigo cultivo: </td>
                    <td><select name="codCul">
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
                <p><input type="submit" name="eliminar" value="Eliminar" /></p>
            </form>
        <?php
        }
        ?>   
</body>

