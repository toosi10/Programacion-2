<?php

    // Se necesita la conexion a la base de datos y las funciones
    require_once ("conexi.php");
    require_once ("funciones.php");

    $filas = nombresVaronSQLTablaCompleta();
	
	if ($filas != null)
	{
		$s = nombresVaronTabla($filas);
		
		echo $s;
	}

?>