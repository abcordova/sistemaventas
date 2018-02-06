<?php
require_once "global.php";

$conexion = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);

mysqli_query( $conexion, 'SET NAMES " ' .DB_ENCODE.'"');

//Si tenemos un posible error en la conexión lo mostramos
if (mysqli_connect_errno())
{
	printf("Falló conexión a la base de datos : %s\n",mysql_connect_error());
	exit();
}

if (!function_exists('ejecutarConsulta'))
{
	/**
	 * [ejecutarConsulta Ejecuta consulta]
	 * @param  [String] $sql [Setencia Sql]
	 * @return [String] $query [Regresa todos los datos]
	 * @author [Rabi Leon] <[rabi_leon@hotmail.com]>
	 */
	function ejecutarConsulta($sql)
	{
		global $conexion;
		$query = $conexion->query($sql);
		return $query;
	}
	/**
	 * [ejecutarConsultaSimpleFila description]
	 * @param  [String] $sql [Setencia Sql]
	 * @return [String] $row [Regresa solo un registro]
	 * @author [Rabi Leon] <[rabi_leon@hotmail.com]>
	 */
	function ejecutarConsultaSimpleFila($sql)
	{
		global $conexion;
		$query = $conexion->query($sql);
		$row = $query->fetch_assoc();
		return $row;
	}
	/**
	 * [ejecutarConsulta_retornarID Regresa la llave primaria de la tabla]
	 * @param  [String] $sql [Sentencia sql]
	 * @return [String] $conexcion->insert_id [Regresa llave primaria]
	 * @author [Rabi Leon] <[rabi_leon@hotmail.com]>
	 */
	function ejecutarConsulta_retornarID($sql)
	{
		global $conexion;
		$query = $conexion->query($sql);
		return $conexcion->insert_id;
	}
	/**
	 * [limpiarCadena Escapar los caracteres especiales de una cadena para usarlo en la setencia sql]
	 * @param  [String] $str [Cadena]
	 * @return [String] htmlspecialchars($str) [Regresa cadena]
	 * @author [Rabi Leon] <[rabi_leon@hotmail.com]>
	 */
	function limpiarCadena($str)
	{
		global $conexion;
		$str = mysqli_real_escape_string($conexion,trim($str));
		return htmlspecialchars($str);
	}
}
?>