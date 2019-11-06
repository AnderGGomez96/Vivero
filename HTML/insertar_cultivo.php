<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,minimum-scale=1.0">
                <link rel="stylesheet" href="../css/bootstrap.min.css">
	<title>Insercion de Empleados</title>
</head>
<body>
    <div class="container text-center">
    <label>
    <form method="post" action="../Insertar/Insertar_cultivo.php">
        <center>
            <table>
                <tr>
                    <div class="form-group">
                        <td width="50%"><label>CODIGO EMPLEADO</label></td>
                        <td>
                            <select class="form-control" name="codigo_empleado">
                            <?php
                                require ('../conexion.php');
                                $query= "SELECT * FROM empleado WHERE eliminar = 0 ORDER BY codigo_empleado";
                                $resultado= mysqli_query($link,$query);

                                while($extraido= mysqli_fetch_array($resultado))
                                {
                                    echo "<option value='$extraido[codigo_empleado]'>$extraido[codigo_empleado]</option>";
                                }
                            ?>
                            </select>
                        </td>
                    </div>
                </tr>
                <tr>
                    <div class="form-group">
                        <td width="50%"><label>CODIGO PLANTA</label></td>
                        <td>
                        <select class="form-control" name="codigo_planta">
                        <?php
                            require ('../conexion.php');
                            $query= "SELECT * FROM planta WHERE eliminar = 0 ORDER BY codigo_planta";
                            $resultado= mysqli_query($link,$query);

                            while($extraido= mysqli_fetch_array($resultado))
                            {
                                echo "<option value='$extraido[codigo_planta]'>$extraido[codigo_planta]</option>";
                            }
                        ?>
                        </select>
                    </td>
                    </div>
                </tr>
                <tr>
                    <div class="form-group">
                        <td width="50%"><label>HUMEDAD PLANTA</label></td>
                        <td width="50%"><input type="number" name="codigo_planta" class="form-control" id="exampleInputEmail1" placeholder="Humedad Planta"></td>
                    </div>
                </tr>
                <tr>
                    <div class="form-group">
                        <td width="50%"><label>CANTIDAD CULTIVO</label></td>
                        <td width="50%"><input type="number" name="cantidad_cultivo"class="form-control" id="exampleInputEmail1" placeholder="Cantidad Cultivo"></td>
                    </div>
                </tr>
                <tr>
                    <div class="form-group">
                        <td width="50%"><label>HUMEDAD CULTIVO</label></td>
                        <td width="50%"><input type="number" name="humedad_cultivo" class="form-control" id="exampleInputEmail1" placeholder="Humedad Cultivo"></td>
                    </div>
                </tr>
                <tr>
                    <div class="form-group">
                        <td width="50%"><label>EDAD CULTIVO</label></td>
                        <td width="50%"><input type="number" name="edad_cultivo" class="form-control" id="exampleInputEmail1" placeholder="Edad Cultivo"></td>
                    </div>
                </tr>
                <tr>
                    <div class="form-group">
                        <td width="50%"><label>DIAS ABONO</label></td>
                        <td width="50%"><input type="number" name="dias_abono" class="form-control" id="exampleInputEmail1" placeholder="Dias Abono"></td>
                    </div>
                </tr>
                <tr>
                    <div class="form-group">
                        <td width="50%"><label>CRECIMIENTO</label></td>
                        <td width="50%"><input type="number" name="crecimiento" class="form-control" id="exampleInputEmail1" placeholder="Crecimiento"></td>
                    </div>
                </tr>
            </table>
            <center> <br><p><input class="btn btn-primary" type="submit" name="Insertar" value="Insertar" /></p>  </center>  
	</form>
        </center>
        </label>
        </div>
</body>
</html>