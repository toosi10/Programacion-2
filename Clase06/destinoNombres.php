<?php

	// Se necesita la conexion a la base de datos y las funciones
	require_once ("conexi.php");
	require_once ("funciones.php");

	// Obtener el nombre desde el form
	$nombre = $_POST["txtNombre"];

	$SQLquery = nombresVaronSQLAlta("NULL", $nombre);

	if ($SQLquery == true)
	{
		$filas = nombresVaronSQLTablaCompleta();
		
		if ($filas != null)
		{
			$s = nombresVaronTabla($filas);
			
			echo $s;
		}
		else
		{
			
		}
	}
	else
	{
		
		echo "<h3>Error en la consulta SQL</h3>";
		
	}


?>