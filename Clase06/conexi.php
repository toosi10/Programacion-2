<?php

// Se piden las constantes para realizar la conexion
require_once ("credencialesDB.php");

// Se realiza la conexion a la base de datos
$conexion = new mysqli(DB_SERVIDOR, DB_USUARIO, DB_PASSWORD, DB_BASEDEDATOS);

if (!$conexion) // Si no se pudo establecer la conexion
{
	die("No se pudo establecer la conexion");
}


?>