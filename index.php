<!DOCTYPE html>
<html>
	<head>
		<title>Vivero</title>
	</head>
	<body>
		<div>
			<table align="center">
				<h1 align="center">Vivero</h1>
				<BR>
				<tr>
					<td><input type="button" name="cultivo" value="Cultivo" onclick="window.location.href='Lista/lista_cultivo.php'"></td>
					<td><input type="button" name="empleado" value="Empleado" onclick="window.location.href='Lista/lista_empleado.php'"></td>
					<td><input type="button" name="enfermedad" value="Enfermedad" onclick="window.location.href='Lista/lista_enfermedad.php'"></td>
					<td><input type="button" name="infeccion" value="Infeccion" onclick="window.location.href='Lista/lista_infeccion.php'"></td>
					<td><input type="button" name="labores" value="Labores" onclick="window.location.href='Lista/lista_labores.php'"></td>
					<td><input type="button" name="labores_empleado" value="Labores del Empleado" onclick="window.location.href='Lista/lista_labores_empleado.php'"></td>
					<td><input type="button" name="planta" value="Planta" onclick="window.location.href='Lista/lista_planta.php'"></td>
					<td><input type="button" name="ventas" value="Ventas" onclick="window.location.href='Lista/lista_ventas.php'"></td>
				</tr>
			</table>
				<input type="button" name="empleados_cultivo" value="Empleados con cultivo" onclick="window.location.href='Consulta/empleados_cultivo.php'">
				<input type="button" name="plantas_cultivo" value="Plantas en cultivo" onclick="window.location.href='Consulta/plantas_cultivo.php'">
				<input type="button" name="infeccion_cultivo" value="cultivos infectados" onclick="window.location.href='Consulta/infeccion_cultivo.php'">
				<input type="button" name="labores_empleado" value="labores de los empleados" onclick="window.location.href='Consulta/labores_empleado.php'">
		</div>
	</body>
</html>