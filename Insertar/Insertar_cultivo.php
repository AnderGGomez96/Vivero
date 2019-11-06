<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,minimum-scale=1.0">
                <link rel="stylesheet" href="../css/bootstrap.min.css">
	<title>Insertar cultivo</title>
</head>
<body>
	<?php 
	$codEmp=$_POST["codigo_empleado"];
	$codPlanta=$_POST["codigo_planta"];
	$cantCultivo=$_POST["cantidad_cultivo"];
	$humCultivo=$_POST["humedad_cultivo"];
        $edadCultivo = $_POST["edad_cultivo"];
        $diasAbono = $_POST["dias_abono"];
        $crecimiento = $_POST["crecimiento"];
	$error=false;
/*Validaciones*/
	if (empty($codEmp) || !is_numeric($codEmp)) {
		echo "<center><p>Codigo empleado vacio ó no valido</p></center>";
		$error=true;
	}
	if (empty($codPlanta) || !is_numeric($codPlanta)) {
		echo "<center><p>Codigo planta vacio ó no valido</p></center>";
		$error=true;
	}
	if (empty($cantCultivo) || !is_numeric($cantCultivo) || $cantCultivo<0) {
		echo "<center><p>Cantidad de cultivo vacio ó no valido</p></center>";
		$error=true;
	}
	if (empty($humCultivo) || !is_numeric($humCultivo) || $humCultivo<0) {
		echo "<center><p>Humedad cultivo vacio ó no valido</p></center>";
		$error=true;
	}
        if (empty($edadCultivo) || !is_numeric($edadCultivo) || $edadCultivo<0) {
		echo "<center><p>Edad cultivo vacio ó no valido</p></center>";
		$error=true;
	}
        if (empty($diasAbono) || !is_numeric($diasAbono) || $diasAbono<0) {
		echo "<center><p>Dias de abono vacio ó no valido</p></center>";
		$error=true;
	}
        if (empty($crecimiento) || !is_numeric($crecimiento) || $crecimiento<0) {
		echo "<center><p>crecimiento cultivo"
            ." vacio ó no valido</p>";
		$error=true;
	}
	if ($error)
	{
            ?>
                <center><input class="btn btn-primary" onclick=location.href='../HTML/insertar_cultivo.html' type="submit" name="Insertar" value="Insertar" /></p></center>
            <?php
	}else
	{
		require('../conexion.php');
                $sql = "SELECT `codigo_cultivo` FROM `cultivo` WHERE (`codigo_empleado` = $codEmp AND `codigo_planta` = $codPlanta"
                            . " AND `cantidad_cultivo`=$cantCultivo AND `humedad_cultivo`=$humCultivo"
                            . " AND `edad_cultivo`=$edadCultivo AND `dias_abono` = $diasAbono"
                            . " AND `crecimiento`=$crecimiento)";
                $result = mysqli_query($link, $sql);
                $row = mysqli_fetch_array($result, MYSQLI_NUM);
                if(is_null($row)){
                    $sql="INSERT INTO cultivo (codigo_empleado,"
                            . "codigo_planta,cantidad_cultivo,humedad_cultivo,edad_cultivo,dias_abono,"
                            . "crecimiento,muerte,termino)"
                            . "VALUES ($codEmp,$codPlanta,$cantCultivo,$humCultivo,$edadCultivo,"
                            . "$diasAbono,$crecimiento,0,0)";
                }else{
                    $sql="UPDATE `cultivo` SET `muerte` = 0,`termino`=0"
                            . " WHERE (`codigo_empleado` = $codEmp AND `codigo_planta` = $codPlanta"
                            . " AND `cantidad_cultivo`=$cantCultivo AND `humedad_cultivo`=$humCultivo"
                            . " AND `edad_cultivo`=$edadCultivo AND `dias_abono` = $diasAbono"
                            . " AND `crecimiento`=$crecimiento)";
                }
		if ($link->query($sql) === TRUE) {
		    echo "<center><p>Nuevo registro creado satisfactoriamente</p></center>";
                    ?>
                    <center><input class="btn btn-primary" onclick=location.href='../Lista/lista_cultivo.php' type="submit" name="Insertar" value="Cultivos" /></p></center>
                    <?php
		} else {
		    echo "Error: " . $sql . "<br>" . $link->error;
		}
	}

	 ?>
</body>
</html>