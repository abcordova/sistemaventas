<?php

//Incluímos incialmente la conexión a la base de datos
require "../config/conexion.php";

/**
* Clase Categoria
* Autor Rabi Leon
*/
class Categoria
{
	
	//Implementamos nuestro constructor 
	public function __construct()
	{
		
	}

	//Implementamos un método para insetar registros
	public function insetarCategoria($nombre, $descripcion)
	{	
		$sql = "INSERT INTO categoria (nombre, descripcion, condicion)
				VALUES ('$nombre', '$descripcion', '1')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editarCategoria($idcategoria, $nombre, $descripcion)
	{
		$sql = "UPDATE categoria SET nombre = '$nombre', descripcion = '$descripcion' 
				WHERE idcategoria = '$idcategoria' ";
		return ejecutarConsulta($sql);	
	}

	//Implementamos un método para desactivar categorias
	public function desactivarCategoria($idcategoria)
	{
		$sql= "UPDATE categoria SET condicion='0' WHERE idcategoria='$idcategoria' ";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorias
	public function activarCategoria($idcategoria)
	{
		$sql= "UPDATE categoria SET condicion='1' WHERE idcategoria='$idcategoria' ";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrarCategoria($idcategoria)
	{
		$sql= "SELECT * FROM categoria WHERE idcategoria= '$idcategoria'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listarCategoria()
	{
		$sql = "SELECT * FROM categoria";
		return ejecutarConsulta($sql);
	}


}

?>
