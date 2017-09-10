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
		
	while ( $fila = mysqli_fetch_object($filas) )
	{

		$s .= "\n<tr>\n";
		
		$s .= "<td>" . $fila->{'id'} . "</td>\n";
		$s .= "<td>" . $fila->{'nombre'} . "</td>\n";
		
		$s .= "\n</tr>\n";
		
	}
		
	$s .= "\n</table>\n";
	
	return $s;
	
}


?>