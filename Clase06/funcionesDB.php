<?php

require_once ("conexi.php");


function nombresVaronSQLAlta($param_id, $param_nombre)
{
	global $conexion;
	
	$preConsulta = "INSERT INTO tblnombresvaron (id, nombre) VALUES (?,?)";
	
	if ( $consulta = $conexion->prepare( $preConsulta ) )
	{
		$consulta->bind_param('ss', $param_id, $param_nombre);
			
		if ( $consulta->execute() )
		{
			return true;
		}
		else
		{
			return false;
		}
	
	}
	else
	{
		return false;
	}
	
}



function nombresVaronSQLTablaCompleta()
{
	global $conexion;

	$sql  = "";
	$sql .= " SELECT ";
	$sql .= " nv.id as id, ";
	$sql .= " nv.nombre as nombre ";
	$sql .= " FROM ";
	$sql .= " tblnombresvaron nv ";
	$sql .= " ORDER BY nombre ASC ";
	
	$result = $conexion->query($sql);

	if ($result->num_rows > 0)
	{
		return ($result);
	}
	else
	{
		return null;
	}
}



function nombresVaronTabla($filas)
{
		
	global $conexion;
	
	$s = "";
		
	$s = "\n<table border = \"1\" class=\"\">\n";

	$s .= "<tr><td>ID</td><td>NOMBRE</td><td>BORRAR</td><td>MODIFICAR</td></tr>";
		
	while ( $fila = mysqli_fetch_object($filas) )
	{

		$s .= "\n<tr>\n";
		
		$s .= "<td>" . $fila->{'id'} . "</td>\n";
		$s .= "<td>" . $fila->{'nombre'} . "</td>\n";

		$clave = "Ezequiel" . $fila->{'id'};

		//$enlace = "<a href=\"CTRLborrarNombre.php?id=" . md5($fila->{'id'}) . "\">borrar</a>"; // md5() encripta
		$enlace = "<a href=\"CTRLborrarNombre.php?id=" . sha1($clave) . "\">borrar</a>"; //sha1() encripta
		$s .= "<td>" . $enlace . "</td>";

		$enlace = "<a href=\"CTRLmodificarNombre.php?id=" . sha1($clave) . "\">modificar</a>";
		$s .= "<td>" . $enlace . "</td>";
		
		$s .= "\n</tr>\n";
		
	}
		
	$s .= "\n</table>\n";
	
	return $s;
	
}


?>