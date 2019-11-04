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

		$error=false;
		if (empty($codigo_cultivo)) {
			echo "cultivo no valido";
			$error=true;
		}
		if (empty($termino)) {
			echo "No se actualizara el cultivo";
			$error=true;
		}
		if ($error)
		{
			echo"<button onclick=location.href='terminar_cultivo.php'>Pagina anterior</button>";
		}else
		{
			require('../conexion.php');
			$sql="SELECT codigo_planta, cantidad_cultivo FROM cultivo WHERE (codigo_cultivo=$codigo_cultivo AND termino = 0)";
			$resultado=mysqli_query($link,$sql);
			$extracto=mysqli_fetch_array($resultado);
			
			$actualizar_planta="UPDATE planta SET cantidad_flor = (cantidad_flor + $extracto[cantidad_cultivo]) WHERE codigo_planta=$extracto[codigo_planta]";
			
			if ($link->query($actualizar_planta)===TRUE) {
				$actualizar_cultivo="UPDATE cultivo SET termino=$termino WHERE codigo_cultivo=$codigo_cultivo"; 

				if ($link->query($actualizar_cultivo)===TRUE) {
					echo "<p>Registro actualizado satisfactoriamente</p>";
					echo"<p><button onclick=location.href='terminar_cultivo.php'>Termine un nuevo cultivo</button></p>";
				}else
				{
					echo "Error: " . $sql . "<br>" . $link->error;
				}
			}else
			{
				echo "Error: " . $sql . "<br>" . $link->error;
			} 
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

							<option value="1">Sí.</option>
							<option value="0">No.</option>
							<option value="2">Sí.</option>
							<option value="1">No.</option>
						</select>
					</td>
				</tr>
			</table>
			<input type="submit" name="submit" value="Terminar">
		</form>
		<button onclick=location.href='../Lista/lista_cultivo.php'>Lista Cultivo</button>
	<?php
	}
	?>
</body>
</html>