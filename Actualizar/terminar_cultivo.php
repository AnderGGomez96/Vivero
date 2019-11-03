<!DOCTYPE html>
<html>
<head>
	<title>Terminar un cultivo.</title>
</head>
<body>
	Terminar un cultivo.

	<?php
	if (isset($_POST['submit'])) 
	{
		$codigo_cultivo=$_POST["codigo_cultivo"];
		$termino=$_POST["termino"];
		if (empty($termino)) {
			echo "<p>opcion no valida. <button onclick=location.href='terminar_cultivo.php'>Pagina anterior</button></p>";
		}
	}
	else
	{
	?>
		<form method="POST" action="terminar_cultivo.php">
			<table border="1">
				<tr>
					<td>Codigo cultivo</td>
					<td>
						<select name="codigo_cultivo">
							<?php
								require ('../conexion.php');
								$query= "SELECT * FROM cultivo WHERE termino = 0 ORDER BY codigo_cultivo";
								$resultado= mysqli_query($link,$query);

								while($extraido= mysqli_fetch_array($resultado))
								{
									echo "<option value='$extraido[codigo_cultivo]'>$extraido[codigo_cultivo]</option>";
								}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Terminar cultivo.</td>
					<td>
						<select name="termino">
							<option value="2">Sí.</option>
							<option value="1">No.</option>
						</select>
					</td>
				</tr>
			</table>
			<input type="submit" name="submit" value="Terminar">
		</form>
	<?php
	}
	?>

</body>
</html>