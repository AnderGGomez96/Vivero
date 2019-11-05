<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,minimum-scale=1.0">
                <link rel="stylesheet" href="../css/bootstrap.min.css">
	<title>Insertar enfermedad</title>
</head>
<body>
	<?php 
	$enfermedad=$_POST["nombre_enfermedad"];
	$tratamiento=$_POST["tratamiento"];
	$error=false;
/*Validaciones*/
	if (empty($enfermedad) || is_numeric($enfermedad)) {
		echo "<center><p>Enfermedad vacia ó no valida.</p></center>";
		$error=true;
	}
	if ($error)
	{
            ?>
            <center><input class="btn btn-primary" onclick=location.href='../HTML/insertar_enfermedad.html' type="submit" name="Volver" value="Volver" /></p></center>
            <?php
	}else
	{
		require('../conexion.php');
                
                $sql="SELECT `nombre_enfermedad` FROM `enfermedad` WHERE `nombre_enfermedad`='$enfermedad'";
                $result = mysqli_query($link, $sql);
                $row = mysqli_fetch_array($result, MYSQLI_BOTH);
        
                if(is_null($row)){
                    $sql="INSERT INTO enfermedad (nombre_enfermedad,tratamiento,eliminar)"
                            . "VALUES ('$enfermedad','$tratamiento',0)";
                }else{
                    $sql="UPDATE `enfermedad` SET `eliminar` = 0"
                            . " WHERE `nombre_enfermedad` = '$enfermedad'";
                }
		if ($link->query($sql) === TRUE) {
		    echo "<p>Nuevo registro creado satisfactoriamente</p>";
		    echo"<p><button onclick=location.href='../Lista/lista_enfermedad.php'>Volver</button></p>";
		} else {
		    echo "Error: " . $sql . "<br>" . $link->error;
		}
	}
        

	 ?>
</body>
</html>